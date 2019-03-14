<?php

namespace core;

require_once __DIR__ .'/ValidateException.php';

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

    /**
     * @param string $entry
     * @return array
     * @throws ValidateException
     */
    public function findGame(string $entry): array
    {
        $this->validateInput($entry);

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

    /**
     * @param string $input
     * @throws ValidateException
     */
    private function validateInput(string $input): void
    {
        if (!preg_match('/^[^\W_]+$/', $input)) {
            throw new ValidateException('Input should contain only letter and digits');
        }
    }
}
