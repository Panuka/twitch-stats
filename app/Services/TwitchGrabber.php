<?php

namespace App\Services;


use App\StreamInfoLog;
use App\StreamingServiceGame;
use TwitchApi\TwitchApi;

class TwitchGrabber implements SourceGrabberServiceInterface
{

    private $sdk;
    private $streamsByQuery = 100;

    public function __construct(TwitchApi $twitchApi)
    {
        $this->sdk = $twitchApi;
    }

    /**
     * @inheritdoc
     */
    function grab(array $games)
    {
        $streamInfoLogsData = [];
        foreach ($games as $game) {
            $date = new \DateTime();
            $sourceGame = StreamingServiceGame::where([
                'game_id' => $game['id'],
                'service_id' => SourceGrabberServiceInterface::TWITCH_ID,
            ])->first();

            $stub = [
                'game_id' => $game['id'],
                'streaming_service_id' => SourceGrabberServiceInterface::TWITCH_ID,
                'date' => $date,
            ];

            $streamsPages = $this->getStreams($sourceGame->service_game_id);
            for ($streamsPage = $streamsPages->current(); count($streamsPage['streams']); $streamsPage = $streamsPages->next()) {
                foreach ($streamsPage['streams'] as $stream) {
                    $data = $stub;
                    $data['viewer_count'] = $stream['viewers'];
                    $streamInfoLogsData[] = $data;
                }
            }
        }

        return StreamInfoLog::insert($streamInfoLogsData);
    }

    private function getStreams($gameId)
    {
        $offset = 0;
        while ($streams = $this->sdk->getLiveStreams(null, $gameId, null, 'live', $this->streamsByQuery, $offset)) {
            $offset += $this->streamsByQuery;
            yield $streams;
        }
    }
}