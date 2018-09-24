<?php

namespace App\Model;

class ApiUser implements ApiUserInterface
{
    /** @var int */
    private $id;
    /** @var string */
    private $firstName;
    /** @var string */
    private $lastName;
    /** @var string */
    private $avatar;

    /**
     * ApiUser constructor.
     * @param int $id
     * @param string $firstName
     * @param string $lastName
     * @param string $avatar
     */
    public function __construct(int $id, string $firstName, string $lastName, string $avatar)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->avatar = $avatar;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }
}
