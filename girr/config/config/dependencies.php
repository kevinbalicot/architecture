<?php

use App\Comment\Application\Controller\Add as AddController;
use App\Comment\Application\Controller\Index as IndexController;
use App\Comment\Application\Operation\Read\Browse\Handler as CommentBrowseHandler;
use App\Comment\Application\Operation\Read\Browse\Query as CommentBrowseQuery;
use App\Comment\Application\Operation\Write\Add\Command as CommentAddCommand;
use App\Comment\Application\Operation\Write\Add\Handler as CommentAddHandler;
use App\Comment\Infrastructure\Persistence\File\Repository\Provider;
use App\Comment\UI\API\Action\Add;
use App\Comment\UI\Front\Action\Index;
use App\Comment\UI\Front\Responder\HomepageResponder;
use App\Comment\UI\Shared\Responder\HtmlResponder;
use App\Comment\UI\Shared\Responder\HttpResponder;
use App\Comment\UI\Shared\Responder\JsonResponder;
use App\Shared\Infrastructure\Comment\Manager;
use App\Shared\Infrastructure\MessageBus\SyncCommandBus;
use App\Shared\Infrastructure\MessageBus\SyncQueryBus;
use App\Shared\Infrastructure\Storage\JsonStorable;
use DI\Container;
use Psr\Container\ContainerInterface;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;

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

$container->set('comment_provider', function (ContainerInterface $c) {
    return new Provider($c->get('comment_manager'));
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

$container->set('comment_browse_handler', function (ContainerInterface $c) {
    return new CommentBrowseHandler($c->get('comment_provider'));
});

$container->set('comment_add_handler', function (ContainerInterface $c) {
    return new CommentAddHandler($c->get('comment_provider'));
});

$container->set('command_bus', function (ContainerInterface $c) {
    return new MessageBus([
        new HandleMessageMiddleware(new HandlersLocator([
            CommentBrowseQuery::class => [$c->get('comment_browse_handler')],
            CommentAddCommand::class => [$c->get('comment_add_handler')],
        ])),
    ]);
});

$container->set('sync_command_bus', function (ContainerInterface $c) {
    return new SyncCommandBus($c->get('command_bus'));
});

$container->set('sync_query_bus', function (ContainerInterface $c) {
    return new SyncQueryBus($c->get('command_bus'));
});

$container->set('index_comment', function (ContainerInterface $c) {
    return new IndexController($c->get('sync_query_bus'));
});

$container->set('add_comment', function (ContainerInterface $c) {
    return new AddController($c->get('sync_command_bus'));
});

$container->set('index_comment_action', function (ContainerInterface $c) {
    return new Index(
        $c->get('index_comment'),
        $c->get('homepage_responder')
    );
});

$container->set('add_comment_action', function (ContainerInterface $c) {
    return new Add(
        $c->get('add_comment'),
        $c->get('json_responder')
    );
});
