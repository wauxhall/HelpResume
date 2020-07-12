<?php

namespace App\Services;

use App\Dto\MLDto;
use Illuminate\Support\Facades\Http;
use League\Uri\Uri;

class MLService
{
    public function sendRequest(MLDto $dto): array
    {
        $host = config('api.ml.url');

        $url = (string) Uri::createFromString($host)->withPath('/getProfile');

        $response = Http::post($url, [
            'data' => $dto->toJson()
        ]);

        if (!$response || $response->failed()) {
            $additional = $response ? " (http-код {$response->status()})" : '';
            throw new \Exception('Ошибка запроса к серверу машинного обучения' . $additional);
        }

        return $response->json();
    }
}
