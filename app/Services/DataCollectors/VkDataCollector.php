<?php

namespace App\Services\DataCollectors;

use App\Builders\Request\VkApi;
use App\Contracts\DataCollectorInterface;
use App\Dto\MLDto;
use App\Dto\SiteDto;
use Carbon\Carbon;

class VkDataCollector implements DataCollectorInterface
{
    private $api;
    private $mlDto;

    public function __construct(VkApi $api, MLDto $mlDto)
    {
        $this->api   = $api;
        $this->mlDto = $mlDto;
    }

    public function collect(SiteDto $siteDto): MLDto
    {
        $screenName = $siteDto->getPath();

        $user = $this->api->getUserByScreenName($screenName);
        $groups = $this->api->getUserGroupNames($user['id']);
        $friends = $this->api->getUserFriends($user['id']);

        $ageRand = rand (20, 30);
        if (isset($user['bdate'])) {
            $bday = Carbon::parse($user['bdate']);
            $age = Carbon::today()->diffInYears($bday);

            if ($age > 80) {
                $age = $ageRand;
            }
        } else {
            $age = $ageRand;
        }

        $isCountryRussia = 1;
        if (!empty($user['country'])) {
            $isCountryRussia = intval($user['country']['id'] === 1);
        }

        $isBigCity = 0;
        if (!empty($user['city'])) {
            $isBigCity = intval($user['city']['id'] === 1 || $user['city']['id'] === 2);
        }

        $sex = isset($user['sex']) && $user['sex'] === 2 ? 1 : 0;
        $followers = $user['followers_count'] ?? 0;
        $friendsCount = $friends['count'] ?? 0;

        $this->mlDto->setFirstName($user['first_name']);
        $this->mlDto->setLastName($user['last_name']);

        $this->mlDto->setAge($age);
        $this->mlDto->setCommunities(implode(',', $groups));
        $this->mlDto->setCountry($isCountryRussia);
        $this->mlDto->setFollowers($followers);
        $this->mlDto->setFriends($friendsCount);
        $this->mlDto->setIsBigCity($isBigCity);
        $this->mlDto->setSex($sex);

        return $this->mlDto;
    }
}
