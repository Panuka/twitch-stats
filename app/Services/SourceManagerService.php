<?php


namespace App\Services;


use App\Domain\SourceFactory;
use App\StreamingService;

class SourceManagerService implements SourceManagerServiceInterface
{
    private $sourceFactory;

    public function __construct(SourceFactory $sourceFactory)
    {
        $this->sourceFactory = $sourceFactory;
    }

    /**
     * @inheritdoc
     */
    public function getActiveGrabbers()
    {
        $streamingServices = StreamingService::where(['is_enable'=>1])->get();

        $grabbers = [];
        foreach ($streamingServices as $streamingService) {
            $grabbers[] = $this->sourceFactory->build($streamingService);
        }

        return $grabbers;
    }
}