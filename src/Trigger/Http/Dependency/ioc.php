<?php


$services[\mhndev\bestPractice\Trigger\Http\Endpoint\Post\CreatePost::class] = function (\Psr\Container\ContainerInterface $c) {
    return new \mhndev\bestPractice\Trigger\Http\Endpoint\Post\CreatePost(
        $c->get(\mhndev\bestPractice\App\Action\Post\ActionCreatePost::class),
        $c->get(\mhndev\bestPractice\App\Action\Post\ActionNotifyUsersForNewPost::class)
    );
};

return $services;
