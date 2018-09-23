<?php

namespace App\Provider;

use App\Model\ApiUserCollection;

interface UserProviderInterface
{
    /**
     * @param Int|null $page
     * @param Int|null $perPage
     * @return ApiUserCollection
     */
    public function listUsers(?Int $page, ?Int $perPage) : ApiUserCollection;
}
