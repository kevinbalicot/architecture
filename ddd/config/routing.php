<?php

use Slim\Psr7\Request;
use Slim\Psr7\Response;

$app->get('/', function (Request $request, Response $response) use ($app) {
    $action = $app->getContainer()->get('index_comment');

    return $action($request, $response);
});

$app->post('/', function (Request $request, Response $response) use ($app) {
    $action = $app->getContainer()->get('add_comment');

    return $action($request, $response);
});
