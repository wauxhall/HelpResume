<?php

namespace App\Dto;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class ProfileDto implements Arrayable, Jsonable
{
    protected $firstName = '';
    protected $lastName  = '';
    protected $age = 0;
    protected $profession = '';
    protected $skills = '';
    protected $psycho = '';

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

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getProfession(): string
    {
        return $this->profession;
    }

    /**
     * @param string $profession
     */
    public function setProfession(string $profession): void
    {
        $this->profession = $profession;
    }

    /**
     * @return string
     */
    public function getSkills(): string
    {
        return $this->skills;
    }

    /**
     * @param string $skills
     */
    public function setSkills(string $skills): void
    {
        $this->skills = $skills;
    }

    /**
     * @return string
     */
    public function getPsycho(): string
    {
        return $this->psycho;
    }

    /**
     * @param string $psycho
     */
    public function setPsycho(string $psycho): void
    {
        $this->psycho = $psycho;
    }

    public function toArray()
    {
        return [
            'firstName' => $this->getFirstName(),
            'lastName' => $this->getLastName(),
            'age' => $this->getAge(),
            'profession' => $this->getProfession(),
            'skills' => $this->getSkills(),
            'psycho' => $this->getPsycho(),
        ];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray());
    }
}
