<?php
$services['db'] =  function (\Psr\Container\ContainerInterface $c) {
    $hostname = 'localhost';
    $port = '3341';
    $username = 'root';
    $password = '123456';
    $dbname = 'best';

    try {
        $db = new PDO("mysql:host=$hostname:$port;dbname=$dbname", $username, $password);

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (\Exception $e){

        throw $e;
        // handle db connection error
    }

    return $db;

};

$services[\mhndev\bestPractice\App\DataStorage\Repository\Contract\iRepositoryPost::class] = function (\Psr\Container\ContainerInterface $c){
    return new \mhndev\bestPractice\App\DataStorage\Repository\Mysql\RepositoryPost($c->get('db'));
};

$services[\mhndev\bestPractice\App\DataStorage\Repository\Contract\iRepositoryUser::class] = function(\Psr\Container\ContainerInterface $c){
    return new \mhndev\bestPractice\App\DataStorage\Repository\Mysql\RepositoryUser($c->get('db'));
};

$services[\mhndev\bestPractice\App\Service\Contract\iEmailSender::class] = function (\Psr\Container\ContainerInterface $c){
    return new \mhndev\bestPractice\App\Service\EmailSender();
};


$services[\mhndev\bestPractice\App\Service\Contract\iPostNotifier::class] = function(\Psr\Container\ContainerInterface $c){
    return new \mhndev\bestPractice\App\Service\EmailPostNotifier($c->get(\mhndev\bestPractice\App\Service\Contract\iEmailSender::class));
};

$services[\mhndev\bestPractice\App\Action\Post\ActionNotifyUsersForNewPost::class] = function(\Psr\Container\ContainerInterface $c){
    return new \mhndev\bestPractice\App\Action\Post\ActionNotifyUsersForNewPost(
        $c->get(\mhndev\bestPractice\App\DataStorage\Repository\Contract\iRepositoryUser::class),
        $c->get(\mhndev\bestPractice\App\Service\Contract\iPostNotifier::class)
    );
};

$services[\mhndev\bestPractice\App\Action\Post\ActionCreatePost::class] = function(\Psr\Container\ContainerInterface $c){
    return new \mhndev\bestPractice\App\Action\Post\ActionCreatePost(
        $c->get(\mhndev\bestPractice\App\DataStorage\Repository\Contract\iRepositoryPost::class)
    );
};


return $services;
