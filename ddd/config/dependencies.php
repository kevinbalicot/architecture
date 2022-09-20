<?php

use App\Comment\Application\Controller\Add;
use App\Comment\Application\Controller\Index;
use App\Comment\Infrastructure\Persistence\File\Repository\Provider;
use DI\Container;
use Psr\Container\ContainerInterface;
use App\Shared\Infrastructure\Storage\JsonStorable;
use App\Shared\Infrastructure\Comment\Manager;

/** @var Container $container */
$container = $container ?? $app->getContainer();

$container->set('comment_store', function () {
    return new JsonStorable(
        __DIR__ . '/../data',
        'comments'
    );
});

$container->set('comment_manager', function (ContainerInterface $c) {
    return new Manager($c->get('comment_store'));
});

$container->set('comment_provider', function (ContainerInterface $c) {
    return new Provider($c->get('comment_manager'));
});

$container->set('index_comment', function (ContainerInterface $c) {
    return new Index($c->get('comment_provider'));
});

$container->set('add_comment', function (ContainerInterface $c) {
    return new Add($c->get('comment_provider'));
});
