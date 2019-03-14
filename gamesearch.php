<?php
/**
 * Created by PhpStorm.
 * User: mzapeka
 * Date: 13.03.19
 * Time: 20:18
 */
use core\Api;

require_once __DIR__ .'/core/Api.php';

try {
    $api = new Api();
    echo $api->search();
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
