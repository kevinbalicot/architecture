<?php

use DI\Container;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

AppFactory::setContainer(new Container());
$app = AppFactory::create();

require __DIR__ . '/../config/dependencies.php';
require __DIR__ . '/../config/routing.php';

$app->addErrorMiddleware(true, true, true);

$app->run();
