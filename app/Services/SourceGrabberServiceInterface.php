<?php

namespace App\Services;


use App\Game;

interface SourceGrabberServiceInterface
{

    /**
     * Return generator with list current stream by game
     * @param Game[] $game
     * @return \Generator
     */
    function grab(array $game);

}