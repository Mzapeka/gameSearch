<?php
/**
 * Created by PhpStorm.
 * User: mzapeka
 * Date: 13.03.19
 * Time: 19:55
 */
namespace core;

class Api
{
    protected $input = '';

    /**
     * Api constructor.
     */
    public function __construct()
    {
        header('Access-Control-Allow-Orgin: *');
        header('Access-Control-Allow-Methods: *');
        header('Content-Type: application/json');

        $this->input = $_GET['input'] ?? '';
    }

    /**
     * @param $data
     * @param int $status
     * @return false|string
     */
    private function response($data, $status = 500)
    {
        header('HTTP/1.1 ' . $status . " " . $this->requestStatus($status));
        return json_encode($data);
    }

    /**
     * @param $code
     * @return mixed
     */
    private function requestStatus($code)
    {
        $status = array(
            200 => 'OK',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        );
        return $status[$code] ?: $status[500];
    }

    /**
     * @return string
     */
    public function search(): string
    {
        $gameFinder = new GameFinder();
        $foundGames = $gameFinder->findGame($this->input);
        return $this->response($foundGames, 200);
    }
}
