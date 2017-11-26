<?php

namespace App\Jobs;

use App\Services\StreamingSourceServiceInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class StreamsDataGrabberJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $streamingSourceService;

    public function __construct(StreamingSourceServiceInterface $streamingSourceService)
    {
        $this->streamingSourceService = $streamingSourceService;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // yield
        $streams = $this->streamingSourceService->getStreams();

        foreach ($streams as $stream) {
            // to storage
        }

        return;
    }
}
