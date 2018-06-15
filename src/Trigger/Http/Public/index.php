<?php
namespace
{

    use DI\ContainerBuilder;
    use mhndev\bestPractice\Trigger\Http\Exception\ExceptionHttpMethodNotAllowed;
    use mhndev\bestPractice\Trigger\Http\Exception\ExceptionNotFound;
    use Slim\Http\Request;
    use Slim\Http\Response;


    require __DIR__.'/../../../../vendor/autoload.php';

    $request = Request::createFromGlobals($_SERVER);
    $response = new Response();

    $builder = new ContainerBuilder();

    $builder->addDefinitions(__DIR__ . '/../../../App/Dependency/ioc.php');
    $builder->addDefinitions(__DIR__ . '/../Dependency/ioc.php');


    $container = $builder->build();

    $container->set('request', $request);
    $container->set('response', $response);


    $routeInfo = include __DIR__.'/../Router/setup.php';

    switch ($routeInfo[0]) {
        case FastRoute\Dispatcher::NOT_FOUND:
            throw new ExceptionNotFound;
            break;
        case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
            $allowedMethods = $routeInfo[1];
            throw new ExceptionHttpMethodNotAllowed;
            break;
        case FastRoute\Dispatcher::FOUND:
            $handler = $routeInfo[1];
            $vars = $routeInfo[2];

            $callable = $container->get($handler) ;
            $callable($request, $response);
            break;
    }

}
