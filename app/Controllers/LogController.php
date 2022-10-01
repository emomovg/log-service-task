<?php


namespace App\Controllers;

use App\Services\LogService;
use Exception;

class LogController extends Controller
{
    private LogService $logService;

    public function __construct()
    {
        $this->logService = new LogService();
    }

    public function showLogs(): array
    {
        $data = $this->getQueryStringData();
        try {
            $logFile = $this->logService->getLogs($data);
        } catch (Exception $exception) {
            return self::handleBadRequest();
        }
        return self::generateResponse([
            'statusMessage' => 'success',
            'logs' => $logFile
        ], 200);
    }

    public function storeLog(): array
    {
        $data = $this->getInputData();
        $channel = array_key_exists('channel', $data) ? $data['channel'] : '';
        $this->logService->writeLog($data['message'], $channel);

        return self::generateResponse([
            'statusMessage' => 'success',
        ], 200);
    }
}