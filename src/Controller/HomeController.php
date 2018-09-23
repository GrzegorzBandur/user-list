<?php

namespace App\Controller;

use App\Provider\UserProvider;
use App\Service\ListUserServiceInterface;
use Slim\Views\Twig;

class HomeController
{
    /** @var Twig */
    private $view;
    /** @var ListUserServiceInterface */
    private $listUserService;
    /** @var string */
    const INDEX_TEMPLATE = 'index.html.twig';

    public function __construct(Twig $view, ListUserServiceInterface $listUserService)
    {
        $this->view = $view;
        $this->listUserService = $listUserService;
    }

    /**
     * @param $request
     * @param $response
     * @param $args
     * @return mixed
     */
    public function listUsers($request, $response, $args)
    {
        $data=$this->listUserService->getUsers($request, new UserProvider());
        return $this->view->render($response, self::INDEX_TEMPLATE, array_merge($args, ["collection" => $data]));
    }
}
