<?php

use App\Controller\SiteController;
use App\Core\Application;

require_once __DIR__ . '/../vendor/autoload.php';


$app = new Application();


$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'handleContact']);

$app->run();