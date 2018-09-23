<?php
// DIC configuration

$container = $app->getContainer();

$container['view'] = function ($c) {
    /** @var \Slim\Container $c */
    $settings = $c->get('settings')['twig'];
    $view = new \Slim\Views\Twig($settings['template_path'], [
        'cache' => $settings['cache_path']
    ]);
    $view->getEnvironment()->addGlobal('params', $c->get('request')->getParams());
    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $c->get('request')->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $basePath));

    return $view;
};
// monolog
$container['logger'] = function ($c) {
    /** @var \Slim\Container $c */
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['HomeController'] = function ($c) {
    return new App\Controller\HomeController($c['view'], new App\Service\ListUserService());
};
