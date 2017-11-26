<?php

namespace App\Services;


use App\Game;

interface StreamingSourceServiceInterface
{

    /**
     * Return generator with list current stream by game
     * @param Game $game
     * @return \Generator
     */
    function getStreams(Game $game);

}