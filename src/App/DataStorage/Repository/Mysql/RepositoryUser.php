<?php
namespace mhndev\bestPractice\App\DataStorage\Repository\Mysql;

use mhndev\bestPractice\App\DataStorage\Repository\Contract\iRepositoryUser;
use mhndev\bestPractice\App\Entity\Contract\iEntityCollection;
use mhndev\bestPractice\App\Entity\EntityCollection;

/**
 * Class RepositoryUser
 * @package mhndev\bestPractice\DataStorage\Repository\Mysql
 */
class RepositoryUser implements iRepositoryUser
{

    /**
     * @var \PDO
     */
    protected $connection;

    /**
     * RepositoryUser constructor.
     * @param \PDO $connection
     */
    function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return iEntityCollection
     */
    function getListOfUsersSubscribedForNewPosts()
    {
        return new EntityCollection;
    }

}
