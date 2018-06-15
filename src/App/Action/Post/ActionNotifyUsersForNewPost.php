<?php
namespace mhndev\bestPractice\App\Action\Post;

use mhndev\bestPractice\App\DataStorage\Repository\Contract\iRepositoryUser;
use mhndev\bestPractice\App\Entity\Contract\iEntityPost;
use mhndev\bestPractice\App\Service\Contract\iPostNotifier;

/**
 * Class ActionNotifyUsersForNewPost
 * @package mhndev\bestPractice\Action\Post
 */
class ActionNotifyUsersForNewPost
{

    /**
     * @var iRepositoryUser
     */
    protected $userRepository;


    /**
     * @var iPostNotifier
     */
    protected $postNotifier;

    /**
     * ActionNotifyUsersForNewPost constructor.
     * @param iRepositoryUser $userRepository
     * @param iPostNotifier $postNotifier
     */
    function __construct(iRepositoryUser $userRepository, iPostNotifier $postNotifier)
    {
        $this->userRepository = $userRepository;
        $this->postNotifier = $postNotifier;
    }


    /**
     * @param iEntityPost $post
     */
    function __invoke(iEntityPost $post)
    {
        $users = $this->userRepository->getListOfUsersSubscribedForNewPosts();

        $this->postNotifier->notify($post, $users);
    }


}
