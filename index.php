<?php

require_once __DIR__.'/vendor/autoload.php';

use App\Controllers\Controller;
use App\Controllers\LogController;

header('Content-type:json/applications');

$response = match ($_SERVER['REQUEST_METHOD']) {
    'GET' => (new LogController())->showLogs(),
    'POST' => (new LogController())->storeLog(),
    default => (new Controller())->handleBadRequest()
};

http_response_code($response['code']);

echo json_encode($response);





