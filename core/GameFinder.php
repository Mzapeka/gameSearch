<?php

namespace core;

use storage\GameFileStorage;

class GameFinder
{
    private $storage;

    /**
     * GameFinder constructor.
     */
    public function __construct()
    {
        $this->storage = new GameFileStorage();
    }

    public function findGame(string $entry): array
    {
        $resultArray = [];

        if ($entry === '') {
            return $resultArray;
        }

        $gamesData = $this->storage->getGames();

        foreach ($gamesData->games as $game) {
            if (mb_stristr($game->name, $entry)) {
                $resultArray[] = $game;
            }
        }
        return $resultArray;
    }
}
