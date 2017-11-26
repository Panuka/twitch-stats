<?php

namespace App\Providers;


use App\Services\SourceManagerService;
use App\Services\SourceManagerServiceInterface;
use Illuminate\Support\ServiceProvider;

class StreamingSourceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(SourceManagerServiceInterface::class, SourceManagerService::class);
    }

}