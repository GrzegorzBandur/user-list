<?php

namespace App\Model;

interface ApiUserCollectionInterface
{
    /**
     * @return int
     */
    public function getPage(): int;
    /**
     * @return int
     */
    public function getPerPage(): int;

    /**
     * @return int
     */
    public function getTotal(): int;

    /**
     * @return int
     */
    public function getTotalPages(): int;

    /**
     * @return mixed
     */
    public function getData();
    /**
     * @param ApiUserInterface $apiUser
     * @return mixed
     */
    public function addData(ApiUserInterface $apiUser);

    /**
     * @param ApiUserInterface $apiUser
     * @return mixed
     */
    public function removeData(ApiUserInterface $apiUser);
}
