<?php
namespace mhndev\bestPractice\App\DataStorage\Repository\Contract;

use mhndev\bestPractice\App\DataStorage\ListCriteria;
use mhndev\bestPractice\App\Entity\Contract\iEntityCollection;
use mhndev\bestPractice\App\Entity\Contract\iEntityPost;


/**
 * Interface iRepositoryPost
 * @package mhndev\bestPractice\Repository
 */
interface iRepositoryPost
{

    /**
     * @param iEntityPost $post
     * @return iEntityPost
     */
    function insert(iEntityPost $post);


    /**
     * @param iEntityPost $post
     * @return bool
     */
    function delete(iEntityPost $post);

    /**
     * @param iEntityPost $post
     * @return iEntityPost $post
     */
    function update(iEntityPost $post);


    /**
     * @param ListCriteria $criteria
     * @return iEntityCollection
     */
    function getList(ListCriteria $criteria);

}
