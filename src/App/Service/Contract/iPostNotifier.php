<?php
namespace mhndev\bestPractice\App\Service\Contract;

use mhndev\bestPractice\App\Entity\Contract\iEntityCollection;
use mhndev\bestPractice\App\Entity\Contract\iEntityPost;

/**
 * Interface iPostNotifier
 * @package mhndev\bestPractice\Service\Contract
 */
interface iPostNotifier
{


    /**
     * @param iEntityPost $post
     * @param iEntityCollection $users
     * @return void
     */
    function notify(iEntityPost $post, iEntityCollection $users): void;
}
