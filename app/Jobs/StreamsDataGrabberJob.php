<?php

namespace App\Jobs;

use App\Game;
use App\Services\SourceManagerServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StreamsDataGrabberJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $sourceManagerService;

    public function __construct(SourceManagerServiceInterface $sourceManagerService)
    {
        $this->sourceManagerService = $sourceManagerService;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $grabbers = $this->sourceManagerService->getActiveGrabbers();
        $games = Game::all()->toArray();

        foreach ($grabbers as $grabber) {
            $grabber->grab($games);
        }

        return;
    }
}
