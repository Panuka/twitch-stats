<?php

namespace App\Services;


use App\Game;

interface SourceGrabberServiceInterface
{

    const TWITCH_ID = 1;

    /**
     * Return generator with list current stream by game
     * @param Game[] $games
     * @return bool
     */
    function grab(array $games);

}