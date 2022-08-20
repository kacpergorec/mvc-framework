<?php

use App\Controller\AuthController;
use App\Controller\SiteController;
use App\Core\Application;

require_once __DIR__ . '/../vendor/autoload.php';


$app = new Application();



//
// Routes
//

$app->router->get('/', [SiteController::class, 'home']);

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);


//
// End Routes
//

$app->run();