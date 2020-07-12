<?php

namespace App\Builders\Request;

use VK\Client\VKApiClient;
use VK\Client\Enums\VKLanguage;

class VkApi
{
    private $vkClient;
    private $token;

    public function __construct()
    {
        $this->vkClient = new VKApiClient(config('api.vk.version'), VKLanguage::RUSSIAN);
        $this->token    = config('api.vk.access_token');
    }

    public function handleError(array $response)
    {
        if (empty($response)) {
            throw new \Exception('Ошибка запроса к серверу ВК: сервер выдал пустой ответ');
        }

        if (!empty($response['error'])) {
            throw new \Exception('Ошибка запроса к серверу ВК: ' . $response['error']['error_msg'] . ' (код ' . $response['error']['error_code'] . ')');
        }
    }

    public function getUserByScreenName(string $screenName)
    {
        $params = [
            'user_ids' => [ $screenName ],
            'fields'   => [
                'sex', 'bdate', 'city', 'country', 'followers_count'
            ]
        ];

        $response = $this->vkClient
            ->users()
            ->get($this->token, $params);

        $this->handleError($response);

        $user = $response[0];

        if (!empty($user['deactivated'])) {
            throw new \Exception('Ошибка: пользователь забанен или удален. Собрать инфо невозможно.');
        }

        if (!empty($user['is_closed'])) {
            throw new \Exception('Ошибка: профиль пользователя закрыт. Собрать инфо невозможно.');
        }

        return $user;
    }

    public function getSubscriptions(int $userId)
    {
        $params = [
            'user_id'  => $userId,
            'extended' => 1,
            'count'    => 50
        ];

        $response = $this->vkClient
            ->users()
            ->getSubscriptions($this->token, $params);

        $this->handleError($response);

        return $response;
    }

    public function getUserGroupNames(int $userId)
    {
        $subscriptions = $this->getSubscriptions($userId);

        if (!$subscriptions['count']) {
            return [];
        }

        $result = collect($subscriptions['items'])
            ->filter(function ($value) {
                return $value['type'] == 'page';
            })
            ->pluck('name')
            ->toArray();

        return $result;
    }

    public function getUserFriends(int $userId)
    {
        $params = [
            'user_id'  => $userId
        ];

        $response = $this->vkClient
            ->friends()
            ->get($this->token, $params);

        $this->handleError($response);

        return $response;
    }
}
