<?php
namespace mhndev\bestPractice\App\Entity;

use mhndev\bestPractice\App\Entity\Contract\iEntityPost;
use mhndev\bestPractice\App\Entity\Contract\iEntityUser;
use Traversable;

/**
 * Class EntityPost
 * @package mhndev\bestPractice\Action
 */
class EntityPost implements iEntityPost
{

    /**
     * @var mixed
     */
    protected $identifier;

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
     * @return mixed
     */
    function getIdentifier()
    {
        return $this->identifier;
    }

    /**
     * @return string
     */
    function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return iEntityUser
     */
    function getUser(): iEntityUser
    {
        return $this->user;
    }


    /**
     * @param string $title
     * @return EntityPost
     */
    public function setTitle(string $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @param string $body
     * @return EntityPost
     */
    public function setBody(string $body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param iEntityUser $user
     * @return EntityPost
     */
    public function setUser(iEntityUser $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @param $identifier
     * @return EntityPost
     */
    function setIdentifier($identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * Retrieve an external iterator
     * @link http://php.net/manual/en/iteratoraggregate.getiterator.php
     * @return Traversable An instance of an object implementing <b>Iterator</b> or
     * <b>Traversable</b>
     * @since 5.0.0
     */
    public function getIterator()
    {
        // TODO: Implement getIterator() method.
    }

}
