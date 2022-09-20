<?php

use App\UI\Shared\Responder\JsonResponder;
use DI\Container;
use App\UI\API\Action\PostComment;
use App\UI\Front\Action\Homepage;
use App\UI\Front\Responder\HomepageResponder;
use App\UI\Shared\Responder\HtmlResponder;
use App\UI\Shared\Responder\HttpResponder;
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
    return new Manager(
        $c->get('comment_store')
    );
});

$container->set('html_responder', function () {
    return new HtmlResponder();
});

$container->set('http_responder', function () {
    return new HttpResponder();
});

$container->set('json_responder', function (ContainerInterface $c) {
    return new JsonResponder(
        $c->get('http_responder')
    );
});

$container->set('homepage_responder', function (ContainerInterface $c) {
    return new HomepageResponder(
        $c->get('html_responder')
    );
});

$container->set('homepage_action', function (ContainerInterface $c) {
    return new Homepage(
        $c->get('comment_manager'),
        $c->get('homepage_responder')
    );
});

$container->set('post_comment_action', function (ContainerInterface $c) {
    return new PostComment(
        $c->get('comment_manager'),
        $c->get('json_responder')
    );
});
