<?php
/**
 * Created by PhpStorm.
 * User: mzapeka
 * Date: 13.03.19
 * Time: 19:28
 */
namespace storage;

require_once 'GameStorageInterface.php';

use http\Exception\RuntimeException;

class GameFileStorage implements GameStorageInterface
{
    const DEFAULT_FILE_PATH = __DIR__. '/games.json';

    private $filePath = 'games.json';

    private $gamesArray;

    public function __construct(string $filePath = null)
    {
        $this->setFilePath($filePath ?? self::DEFAULT_FILE_PATH);
    }

    /**
     * Return Games Array
     * @return array
     */
    public function getGames(): \stdClass
    {
        if (!$this->gamesArray) {
            $fileContent = file_get_contents($this->filePath);
            $this->gamesArray = json_decode($fileContent);
        }
        return $this->gamesArray;
    }

    /**
     * @param string $filePath
     */
    public function setFilePath(string $filePath): void
    {
        if (!file_exists($filePath)) {
            throw new RuntimeException(__CLASS__ . ': File not found');
        }
        $this->filePath = $filePath;
    }
}
