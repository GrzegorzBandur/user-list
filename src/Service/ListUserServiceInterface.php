<?php

namespace App\Service;

use App\Model\ApiCollectionInterface;
use App\Provider\UserProviderInterface;
use Slim\Http\Request;

interface ListUserServiceInterface
{
    public function getUsers(Request $request, UserProviderInterface $userProvider) : ApiCollectionInterface;
}
