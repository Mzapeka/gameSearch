<?php
/**
 * Created by PhpStorm.
 * User: mzapeka
 * Date: 13.03.19
 * Time: 19:23
 */
namespace storage;

interface GameStorageInterface
{
    /**
     * Return Games Array
     * @return \stdClass
     */
    public function getGames(): \stdClass;

}