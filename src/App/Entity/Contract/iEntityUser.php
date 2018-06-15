<?php
namespace mhndev\bestPractice\App\Entity\Contract;

/**
 * Interface iEntityUser
 * @package mhndev\bestPractice\Entity\Contract
 */
interface iEntityUser extends iEntity
{

    /**
     * @return mixed
     */
    function getIdentifier();

    /**
     * @return bool
     */
    function isActive();

    /**
     * @return bool
     */
    function userWantsNewsLetter();

    /**
     * @return string
     */
    function getName(): string ;

    /**
     * @return string
     */
    function getEmail(): string ;


}
