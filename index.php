<?php

use App\Controllers\Controller;
use App\Controllers\LogController;

require_once __DIR__."/app/Controllers/Controller.php";
require_once __DIR__."/app/Controllers/LogController.php";
require_once  __DIR__."/app/Services/LogService.php";

header('Content-type:json/applications');

$requestMethod = $_SERVER['REQUEST_METHOD'];

$response = match ($requestMethod) {
    'GET' => (new LogController())->showLogs(),
    'POST' => (new LogController())->storeLog(),
    default => (new Controller())->handleBadRequest()
};

http_response_code($response['code']);

echo json_encode($response);





