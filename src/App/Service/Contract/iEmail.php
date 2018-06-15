<?php
namespace mhndev\bestPractice\App\Service\Contract;

/**
 * Interface iEmail
 * @package mhndev\bestPractice\Service\Contract
 */
interface iEmail
{

    /**
     * @return string
     */
    function getFrom(): string ;

    /**
     * @return mixed
     */
    function getTo(): string ;

    /**
     * @return string
     */
    function getBody(): string ;
}
