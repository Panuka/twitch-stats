<?php

namespace App\Providers;


use App\Services\SourceManagerService;
use App\Services\SourceManagerServiceInterface;
use Illuminate\Support\ServiceProvider;
use TwitchApi\TwitchApi;

class StreamingSourceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(SourceManagerServiceInterface::class, SourceManagerService::class);
        $this->app->instance(TwitchApi::class, new TwitchApi(['client_id' => getenv('TWITCH_API_CLIENT_ID')]));
    }

}