<?php
namespace mhndev\bestPractice\App\Entity\Contract;

/**
 * Interface iEntityPost
 * @package mhndev\bestPractice\Entity\Contract
 */
interface iEntityPost extends iEntity
{

    /**
     * @return mixed
     */
    function getIdentifier();

    /**
     * @param $identifier
     * @return iEntityPost
     */
    function setIdentifier($identifier);

    /**
     * array of strings
     * @return array
     */
    function getTags();

    /**
     * @return string
     */
    function getTitle(): string ;

    /**
     * @return string
     */
    function getBody(): string ;

    /**
     * @return iEntityUser
     */
    function getUser(): iEntityUser;

}
