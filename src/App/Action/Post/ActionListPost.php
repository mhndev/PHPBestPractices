<?php
namespace mhndev\bestPractice\App\Action\Post;

use mhndev\bestPractice\DataStorage\ListCriteria;
use mhndev\bestPractice\DataStorage\Repository\iRepositoryPost;

/**
 * Class ActionListPost
 * @package mhndev\bestPractice\Action
 */
class ActionListPost
{

    /**
     * @var iRepositoryPost
     */
    protected $postRepository;

    /**
     * ActionListPost constructor.
     * @param iRepositoryPost $postRepository
     */
    function __construct(iRepositoryPost $postRepository)
    {
        $this->postRepository = $postRepository;
    }


    /**
     * @param ListCriteria $listCriteria
     * @return \mhndev\bestPractice\Entity\Contract\iEntityCollection
     */
    function __invoke(ListCriteria $listCriteria)
    {
        return $this->postRepository->getList($listCriteria);
    }

}
