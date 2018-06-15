<?php
namespace mhndev\bestPractice\App\Entity;

use mhndev\bestPractice\App\Entity\Contract\iEntityUser;
use Traversable;

/**
 * Class EntityUser
 * @package mhndev\bestPractice\Entity
 */
class EntityUser implements iEntityUser
{

    /**
     * @var mixed
     */
    protected $identifier;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var bool
     */
    protected $newsletter;

    /**
     * @var bool
     */
    protected $active;


    /**
     * @var array of actions
     */
    protected $access;


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
    function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param mixed $identifier
     * @return EntityUser
     */
    public function setIdentifier($identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    /**
     * @param string $name
     * @return EntityUser
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @param string $action
     * @return bool
     */
    function hasAccessTo(string $action)
    {
        return in_array($action, $this->access);
    }

    /**
     * @param string $action
     * @return bool
     */
    function hasNotAccessTo(string $action)
    {
        return !in_array($action, $this->access);
    }

    /**
     * @return bool
     */
    function isActive()
    {
        return $this->active;
    }

    /**
     * @return bool
     */
    function userWantsNewsLetter()
    {
        return $this->newsletter;
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
