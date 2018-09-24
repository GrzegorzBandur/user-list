<?php

namespace App\Model;

interface ApiUserInterface
{
    /**
     * @return int
     */
    public function getId(): int;
    /**
     * @return string
     */
    public function getFirstName(): string;
    /**
     * @return string
     */
    public function getLastName(): string;
    /**
     * @return string
     */
    public function getAvatar(): string;
}
