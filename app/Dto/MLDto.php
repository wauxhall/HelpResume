<?php

namespace App\Dto;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class MLDto implements Jsonable, Arrayable
{
    protected $siteCode;
    protected $sex = 0;
    protected $country = 1;
    protected $isBigCity = 0;
    protected $age = 0;
    protected $communities = [];
    protected $followers = 0;
    protected $friends = 0;
    protected $firstName = '';
    protected $lastName = '';

    /**
     * @return mixed
     */
    public function getSiteCode()
    {
        return $this->siteCode;
    }

    /**
     * @param mixed $siteCode
     */
    public function setSiteCode($siteCode): void
    {
        $this->siteCode = $siteCode;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex): void
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getIsBigCity()
    {
        return $this->isBigCity;
    }

    /**
     * @param mixed $isBigCity
     */
    public function setIsBigCity($isBigCity): void
    {
        $this->isBigCity = $isBigCity;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getCommunities()
    {
        return $this->communities;
    }

    /**
     * @param mixed $communities
     */
    public function setCommunities($communities): void
    {
        $this->communities = $communities;
    }

    /**
     * @return mixed
     */
    public function getFollowers()
    {
        return $this->followers;
    }

    /**
     * @param mixed $followers
     */
    public function setFollowers($followers): void
    {
        $this->followers = $followers;
    }

    /**
     * @return mixed
     */
    public function getFriends()
    {
        return $this->friends;
    }

    /**
     * @param mixed $friends
     */
    public function setFriends($friends): void
    {
        $this->friends = $friends;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray());
    }

    public function toArray()
    {
        return [
            'siteCode' => $this->getSiteCode(),
            'sex' => $this->getSex(),
            'country' => $this->getCountry(),
            'isBigCity' => $this->getIsBigCity(),
            'age' => $this->getAge(),
            'communities' => $this->getCommunities(),
            'followers' => $this->getFollowers(),
            'friends' => $this->getFriends(),
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName()
        ];
    }
}
