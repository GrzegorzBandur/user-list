<?php

namespace App\Provider;

use App\Model\ApiUserCollectionInterface;

interface UserProviderInterface
{
    /**
     * @param Int|null $page
     * @param Int|null $perPage
     * @return ApiUserCollectionInterface
     */
    public function listUsers(?Int $page, ?Int $perPage) : ApiUserCollectionInterface;
}
