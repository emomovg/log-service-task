<?php

namespace App\Services;

use Exception;

class LogService
{
    public function writeLog(string $message, ?string $channel = ''): void
    {
        $dir = 'logs/' . $channel;

        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        $logFileData = $dir . '/log-' . date('Y-m-d') . '.log';
        file_put_contents($logFileData, $message . "\n", FILE_APPEND);
    }

    public function getLogs(array $data)
    {
        $channel = array_key_exists('channel', $data) ? $data['channel'] : '';
        $date = array_key_exists('date', $data) ? $data['date'] : date('Y-m-d');

        $dir = 'logs/' . $channel;
        $logFileName = $dir . '/log-' . $date . '.log';

        if (!file_exists($logFileName)) {
            throw new Exception('Bad request', 400);
        }

        $content = file_get_contents($logFileName);
        $lines = explode("\n", $content);
        array_pop($lines);

        return $lines;

    }
}