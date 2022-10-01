<?php

namespace App\Controllers;


class Controller
{
    public static function generateResponse(array $data, int $statusCode): array
    {
        return [
            'data' => $data,
            'code' => $statusCode
        ];
    }

    protected function getQueryStringData(): array
    {
        return $_GET;
    }

    protected function getInputData(): array
    {
        return json_decode(file_get_contents('php://input'), TRUE);
    }

    public static function handleBadRequest(): array
    {
        return self::generateResponse(
            [
                'statusMessage' => 'http bad request'
            ], 400);
    }

}