<?php

namespace App\Providers;


use Illuminate\Support\ServiceProvider;
use App\Services\StreamingSourceService;
use App\Services\StreamingSourceServiceInterface;

class StreamingSourceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(StreamingSourceServiceInterface::class, StreamingSourceService::class);
    }

}