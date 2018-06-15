<?php
namespace mhndev\bestPractice\Trigger\Http\Request;

use mhndev\bestPractice\App\Entity\Contract\iEntityPost;
use mhndev\bestPractice\App\Entity\Contract\iEntityUser;
use mhndev\bestPractice\App\Entity\EntityPost;
use mhndev\bestPractice\App\Request\Contract\Post\iReqPostCreate;
use mhndev\bestPractice\App\Request\Post\ReqPostCreate;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class PostRequest
 * @package mhndev\bestPractice\Trigger\Http\Request
 */
class PostRequest extends ReqPostCreate implements iReqPostCreate
{

    /**
     * @var ServerRequestInterface
     */
    protected $request;

    /**
     * @var array
     */
    protected $errorMessages = [];

    /**
     * @param ServerRequestInterface $request
     * @return PostRequest
     */
    private function setRequest(ServerRequestInterface $request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * @return array
     */
    public function getErrorMessages()
    {
        return $this->errorMessages;
    }


    /**
     * @return ServerRequestInterface
     * @throws \Exception
     */
    private function getRequest()
    {
        if(empty($this->request)){
            throw new \Exception('you should first call setRequest on class :'.get_class($this));
        }

        return $this->request;
    }


    /**
     * @param ServerRequestInterface $request
     * @return bool
     */
    function isValid(ServerRequestInterface $request)
    {
        $validationResult = $this->setRequest($request)->setPost()->getPostValidator()->validate($this->getPost());

        $this->errorMessages = is_array($validationResult) ? $validationResult : [];

        return ($validationResult == true) ? true : false;
    }


    /**
     * @param ServerRequestInterface $request
     * @return array|bool
     */
    function isNotValid(ServerRequestInterface $request)
    {
        return ! $this->isValid($request);
    }

    /**
     * @param string $title
     * @return $this
     * @throws \Exception
     */
    protected function setTitle()
    {
        $this->title = $this->getRequest()->getParsedBody()['title'];

        return $this;
    }

    /**
     * @param string $body
     * @return $this
     * @throws \Exception
     */
    protected function setBody()
    {
        $this->title = $this->getRequest()->getParsedBody()['body'];

        return $this;
    }

    /**
     * @param iEntityUser $user
     * @return $this
     * @throws \Exception
     */
    protected function setUser()
    {
        $this->user = $this->getRequest()->getParsedBody()['user'];

        return $this;
    }

    /**
     * @param iEntityPost $post
     * @return $this
     */
    protected function setPost()
    {
        $p = new EntityPost;
        $p->setTitle($this->getTitle());
        $p->setBody($this->getBody());
        $p->setUser($this->getUser());
        $this->postEntity = $p;

        return $this;
    }

}
