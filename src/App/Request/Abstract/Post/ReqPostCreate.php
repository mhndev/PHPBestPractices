<?php
namespace mhndev\bestPractice\App\Request\Post;

use mhndev\bestPractice\App\Entity\Contract\iEntityPost;
use mhndev\bestPractice\App\Entity\Contract\iEntityUser;
use mhndev\bestPractice\App\Request\Contract\Post\iReqPostCreate;

/**
 * Class ReqPostCreate
 * @package mhndev\bestPractice\App\Request\Post
 */
abstract class ReqPostCreate implements iReqPostCreate
{

    /**
     * @var PostValidator
     */
    protected $postValidator;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $body;

    /**
     * @var iEntityUser
     */
    protected $user;

    /**
     * @var iEntityPost
     */
    protected $postEntity;



    /**
     * PostRequest constructor.
     * @param PostValidator $postValidator
     */
    function __construct(PostValidator $postValidator)
    {
        $this->postValidator = $postValidator;
    }


    /**
     * @return iEntityPost | array
     */
    function ifRequestValidReturnPost()
    {
        $result = $this->postValidator->validate($this->getPost());

        // return post entity
        if(is_bool($result) && $result == true){
            return $this->getPost();
        }

        # return error messages
        else{
            return $result;
        }

    }



    /**
     * @return string
     */
    function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    function getBody()
    {
        return $this->body;
    }

    /**
     * @return iEntityUser
     */
    function getUser()
    {
        return $this->user;
    }

    /**
     * @return iEntityPost
     */
    function getPost()
    {
        return $this->postEntity;
    }

    /**
     * @return PostValidator
     */
    public function getPostValidator(): PostValidator
    {
        return $this->postValidator;
    }


}
