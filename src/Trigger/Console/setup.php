#!/usr/bin/env php
<?php

require __DIR__.'/../../../vendor/autoload.php';

use DI\ContainerBuilder;
use Symfony\Component\Console\Application;

$application = new Application();
$commands = include __DIR__.'/commands.php';

$builder = new ContainerBuilder();

$builder->addDefinitions(__DIR__ . '/../../App/Dependency/ioc.php');
$builder->addDefinitions(__DIR__ . '/Dependency/ioc.php');


$container = $builder->build();


try {
    foreach ($commands as $command){
        $application->add($container->get($command));
    }

    $application->run();

}
catch (\Exception $e) {

}
