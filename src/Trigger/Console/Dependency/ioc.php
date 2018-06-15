<?php

$services[\mhndev\bestPractice\Trigger\Console\Commands\CreatePost::class] = function (\Psr\Container\ContainerInterface $container){
    return (new \mhndev\bestPractice\Trigger\Console\Commands\CreatePost())
        ->setCreatePostAction($container->get(\mhndev\bestPractice\App\Action\Post\ActionCreatePost::class));
};

return $services;
