<?php
namespace mhndev\bestPractice\App\Service\Contract;

/**
 * Interface iEmailSender
 * @package mhndev\bestPractice\Service\Contract
 */
interface iEmailSender
{

    /**
     * @param iEmail $email
     * @return mixed
     */
    function send(iEmail $email);

}
