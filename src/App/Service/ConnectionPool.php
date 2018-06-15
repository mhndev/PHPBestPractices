<?php
namespace mhndev\bestPractice\App\Service;

use mhndev\bestPractice\Service\Contract\iConnectionPool;

/**
 * Class ConnectionPool
 * @package mhndev\bestPractice\Service
 */
class ConnectionPool implements iConnectionPool
{

    const QUERY_WRITE = 'write';
    const QUERY_READ  = 'read';

    /**
     * @var array
     */
    protected $config = [

        'strategies' => [
            'read_write',
            'table',
            'merged_tables'
        ],

        'connections' => [
            'read' => [
                [
                    'host' => 'slave1',
                    'port' => '3306'
                ],
                [
                    'host' => 'slave2',
                    'port' => '3306'
                ],
                [
                    'host' => 'slave3',
                    'port' => '3306'
                ]
            ],
            'write' => [
                'host' => 'master',
                'port' => '3306'
            ]
        ]

    ];


    /**
     * @param int $query_type
     * @param array $engaged_tables
     * @return \PDO
     */
    function getConnection(int $query_type = null, array $engaged_tables = null)
    {
        // TODO: Implement getConnection() method.
    }

}
