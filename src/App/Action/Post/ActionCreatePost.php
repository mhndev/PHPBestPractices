<?php
namespace mhndev\bestPractice\App\Action\Post;

use mhndev\bestPractice\App\DataStorage\Repository\Contract\iRepositoryPost;
use mhndev\bestPractice\App\Entity\Contract\iEntityPost;

/**
 * Class ActionCreatePost
 * @package mhndev\bestPractice
 */
class ActionCreatePost
{

    /**
     * @var iRepositoryPost
     */
    protected $postRepository;

    /**
     * ActionCreatePost constructor.
     * @param iRepositoryPost $postRepository
     */
    function __construct(iRepositoryPost $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @param iEntityPost $post
     * @return iEntityPost
     */
    function __invoke(iEntityPost $post)
    {
        $pUser = $this->postRepository->insert($post);

        return $pUser;
    }

}
