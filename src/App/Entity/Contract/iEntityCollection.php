<?php
namespace mhndev\bestPractice\App\Entity\Contract;

/**
 * Interface iEntityCollection
 * @package mhndev\bestPractice\Entity\Contract
 */
interface iEntityCollection
{

    /**
     * @return iEntity
     */
    function first();

    /**
     * @return iEntity
     */
    function last();

    /**
     * @param int $n
     * @return iEntity
     */
    function nth(int $n);

    /**
     * @return int
     */
    function count();

    /**
     * @return array
     */
    function toArray();
}
