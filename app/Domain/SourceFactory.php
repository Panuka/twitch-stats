<?php


namespace App\Domain;


use App\Domain\Exceptions\UnexpectedSourceException;
use App\Services\TwitchGrabber;
use App\StreamingService;

class SourceFactory
{

    public function build(StreamingService $streamingService) {
        switch ($streamingService->id) {
            case 1: {
                return app()->make(TwitchGrabber::class);
                break;
            }
            default: {
                throw new UnexpectedSourceException($streamingService->title);
            }
        }
    }

}