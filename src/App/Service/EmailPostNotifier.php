<?php
namespace mhndev\bestPractice\App\Service;

use mhndev\bestPractice\App\Entity\Contract\iEntityCollection;
use mhndev\bestPractice\App\Entity\Contract\iEntityPost;
use mhndev\bestPractice\App\Service\Contract\iEmailSender;
use mhndev\bestPractice\App\Service\Contract\iPostNotifier;


/**
 * Class EmailPostNotifier
 * @package mhndev\bestPractice\Service
 */
class EmailPostNotifier implements iPostNotifier
{

    /**
     * @var iEmailSender
     */
    protected $emailSender;


    /**
     * EmailPostNotifier constructor.
     * @param iEmailSender $emailSender
     */
    function __construct(iEmailSender $emailSender)
    {
        $this->emailSender = $emailSender;
    }

    /**
     * @param iEntityPost $post
     * @param iEntityCollection $users
     * @return void
     */
    function notify(iEntityPost $post, iEntityCollection $users): void
    {
        foreach ($users as $user){

            $email = new Email();

            $this->emailSender->send($email);
        }

    }

}
