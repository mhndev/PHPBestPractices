<?php
namespace mhndev\bestPractice\App\Service\Contract;

use PDO;

/**
 * class VPDO
 * @package mhndev\bestPractice\Service
 */
class VPDO extends PDO
{

    /**
     * @var string
     */
    protected $dsn;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $passwd;

    /**
     * @var array
     */
    protected $options;


    /**
     * @var array
     */
    protected $config = [
        'c1' => [
            'host' => 'master',
            'port' => '3306'
        ]
    ];

    /**
     * @var array
     */
    protected $connections;


    /**
     * VPDO constructor.
     * @param string $dsn
     * @param string $username
     * @param string $passwd
     * @param array $options
     */
    function __construct(string $dsn, string $username, string $passwd, array $options)
    {
        $this->dsn = $dsn;
        $this->username = $username;
        $this->passwd = $passwd;
        $this->options = $options;
    }


    /**
     * @param string $statement
     * @param array $driver_options
     * @return bool|\PDOStatement
     */
    function prepare($statement, array $driver_options = array())
    {
        return $this->selectConnection($statement)->prepare($statement, $driver_options);
    }


    /**
     * @param string $statement
     * @return int
     */
    function exec($statement)
    {
        return $this->selectConnection($statement)->exec($statement);
    }


    /**
     * @param string $statement
     * @param int $mode
     * @param null $arg3
     * @param array $ctorargs
     * @return bool|\PDOStatement
     */
    function query($statement, $mode = PDO::ATTR_DEFAULT_FETCH_MODE, $arg3 = null, array $ctorargs = array())
    {
        return $this->selectConnection($statement)->query($statement, $mode, $arg3, $ctorargs);
    }


    /**
     * @param string $statement
     * @return PDO
     */
    function selectConnection(string $statement)
    {
        return new PDO('mysql:host=');
    }

}
