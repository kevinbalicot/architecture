<?php

use Slim\Psr7\Request;
use Slim\Psr7\Response;

$app->options('/{routes:+}', function (Request $request, Response $response) {
    return $response;
});

// CORS middleware
$app->add(function (Request $request, $handler) {
    $response = $handler->handle($request);

    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

$app->get('/', function (Request $request, Response $response) use ($app) {
    $action = $app->getContainer()->get('index_comment_action');

    return $action($request, $response);
});

$app->post('/api/comment', function (Request $request, Response $response) use ($app) {
    $action = $app->getContainer()->get('add_comment_action');

    return $action($request, $response);
});
