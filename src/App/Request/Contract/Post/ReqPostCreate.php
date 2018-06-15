<?php
namespace mhndev\bestPractice\App\Request\Contract\Post;

use mhndev\bestPractice\App\Entity\Contract\iEntityPost;
use mhndev\bestPractice\App\Entity\Contract\iEntityUser;

/**
 * Class iReqPostCreate
 * @package mhndev\bestPractice\App\Request
*/
interface iReqPostCreate
{

    /**
     * @return string
     */
    function getTitle();

    /**
     * @param string $title
     * @return $this
     */
    function setTitle(string $title);

    /**
     * @return string
     */
    function getBody();

    /**
     * @param string $body
     * @return $this
     */
    function setBody(string $body);

    /**
     * @return iEntityUser
     */
    function getUser();

    /**
     * @param iEntityUser $user
     * @return $this
     */
    function setUser(iEntityUser $user);

    /**
     * @return bool
     */
    function ifRequestValidReturnPost();

    /**
     * @return iEntityPost
     */
    function getPost();

    /**
     * @param iEntityPost $post
     * @return $this
     */
    function setPost(iEntityPost $post);

}
