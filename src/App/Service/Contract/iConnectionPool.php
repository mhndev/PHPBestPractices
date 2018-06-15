<?php
namespace mhndev\bestPractice\App\Service\Contract;

/**
 * Interface iConnectionPool
 * @package mhndev\bestPractice\Service\Contract
 */
interface iConnectionPool
{

    /**
     * @param int $query_type
     * @param array $engaged_tables
     * @return \PDO
     */
    function getConnection(int $query_type = null, array $engaged_tables = null);

}
