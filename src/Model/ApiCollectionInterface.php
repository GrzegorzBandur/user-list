<?php

namespace App\Model;

interface ApiCollectionInterface
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
}
