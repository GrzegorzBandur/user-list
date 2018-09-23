<?php

namespace App\Service;

use App\Model\ApiCollectionInterface;
use App\Provider\UserProviderInterface;
use Slim\Http\Request;

class ListUserService implements ListUserServiceInterface
{
    public function getUsers(Request $request, UserProviderInterface $userProvider): ApiCollectionInterface
    {
        return $userProvider->listUsers($request->getParam("page"), $request->getParam("per_page"));
    }
}
