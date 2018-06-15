<?php
namespace mhndev\bestPractice\App\Service;

use mhndev\bestPractice\App\Service\Contract\iEmail;
use mhndev\bestPractice\App\Service\Contract\iEmailSender;

/**
 * Class EmailSender
 * @package mhndev\bestPractice\Service
 */
class EmailSender implements iEmailSender
{

    /**
     * @param iEmail $email
     * @return mixed
     */
    function send(iEmail $email)
    {
        return true;
    }

}
