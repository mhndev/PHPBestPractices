<?php
namespace mhndev\bestPractice\App\DataStorage\Repository\Contract;

use mhndev\bestPractice\App\Entity\Contract\iEntityCollection;

/**
 * Interface iRepositoryUser
 * @package mhndev\bestPractice\DataStorage\Repository
 */
interface iRepositoryUser
{

    /**
     * @return iEntityCollection
     */
    function getListOfUsersSubscribedForNewPosts();

}
