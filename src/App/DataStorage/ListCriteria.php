<?php
namespace mhndev\bestPractice\App\DataStorage;

/**
 * Class ListCriteria
 * @package mhndev\bestPractice\DataStorage
 */
class ListCriteria
{

    /**
     * @var int
     */
    protected $page;

    /**
     * @var int
     */
    protected $per_page;

    /**
     * @var string
     */
    protected $sort_field;

    /**
     * @var string ASC | DESC
     */
    protected $sort_dir;

    /**
     * @var array
     */
    protected $condition;

    /**
     * @return int
     */
    function getPage(): int
    {
        return $this->page;
    }

    /**
     * @return int
     */
    function getPerPage(): int
    {
        return $this->per_page;
    }

    /**
     * @return string
     */
    function getSortField(): string
    {
        return $this->sort_field;
    }

    /**
     * @return string
     */
    function getSortDir(): string
    {
        return $this->sort_dir;
    }

    /**
     * @return array
     */
    function getCondition(): array
    {
        return $this->condition;
    }

}
