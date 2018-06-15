<?php
namespace mhndev\bestPractice\Trigger\Console\Request;

use mhndev\bestPractice\App\Entity\Contract\iEntityPost;
use mhndev\bestPractice\App\Entity\Contract\iEntityUser;
use mhndev\bestPractice\App\Request\Contract\Post\iReqPostCreate;
use mhndev\bestPractice\App\Request\Post\ReqPostCreate;
use Symfony\Component\Console\Command\Command;

/**
 * Class PostRequest
 * @package mhndev\bestPractice\Trigger\Console\Request
 */
class PostRequest extends ReqPostCreate implements iReqPostCreate
{

    /**
     * @var Command
     */
    protected $command;


    /**
     * PostRequest constructor.
     * @param Command $command
     */
    function __construct(Command $command)
    {
        $this->command = $command;
    }

    /**
     * @param mixed $request
     * @return bool
     */
    function isRequestValid($request)
    {
        // TODO: Implement isRequestValid() method.
    }

    /**
     * @param string $title
     * @return $this
     */
    function setTitle(string $title)
    {
        // TODO: Implement setTitle() method.
    }

    /**
     * @param string $body
     * @return $this
     */
    function setBody(string $body)
    {
        // TODO: Implement setBody() method.
    }

    /**
     * @param iEntityUser $user
     * @return $this
     */
    function setUser(iEntityUser $user)
    {
        // TODO: Implement setUser() method.
    }

    /**
     * @param iEntityPost $post
     * @return $this
     */
    function setPost(iEntityPost $post)
    {
        // TODO: Implement setPost() method.
    }

}
