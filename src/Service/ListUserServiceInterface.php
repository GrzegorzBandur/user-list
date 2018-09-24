<?php

namespace App\Service;

use App\Model\ApiUserCollectionInterface;
use App\Provider\UserProviderInterface;
use Slim\Http\Request;

interface ListUserServiceInterface
{
    /**
     * @param Request $request
     * @param UserProviderInterface $userProvider
     * @return ApiUserCollectionInterface
     */
    public function getUsers(Request $request, UserProviderInterface $userProvider) : ApiUserCollectionInterface;
}
