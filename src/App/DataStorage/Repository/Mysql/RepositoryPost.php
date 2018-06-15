<?php
namespace mhndev\bestPractice\App\DataStorage\Repository\Mysql;

use mhndev\bestPractice\App\DataStorage\ListCriteria;
use mhndev\bestPractice\App\DataStorage\Repository\Contract\iRepositoryPost;
use mhndev\bestPractice\App\Entity\Contract\iEntityCollection;
use mhndev\bestPractice\App\Entity\Contract\iEntityPost;
use Ramsey\Uuid\Uuid;

/**
 * Class RepositoryPost
 * @package mhndev\bestPractice\DataStorage\Repository
 */
class RepositoryPost implements iRepositoryPost
{

    /**
     * @var \PDO
     */
    protected $connection;

    /**
     * RepositoryPost constructor.
     * @param \PDO $connection
     */
    function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param iEntityPost $post
     * @return iEntityPost
     */
    function insert(iEntityPost $post)
    {
        $id = Uuid::uuid4()->toString();

        $post->setIdentifier($id);
        $title = $post->getTitle();
        $body = $post->getBody();
        $user_id = $post->getUser()->getIdentifier();
        $created_at = new \DateTime();
        $date_string = $created_at->format('Y-m-d H:i:s');


        $sql = "INSERT INTO post (id, title, body, user_id, created_at, updated_at) VALUES 
        (:id, :title, :body, :user_id, :created_at, :updated_at)";
        // use exec() because no results are returned
        $stmt = $this->connection->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':body', $body);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':created_at', $date_string);
        $stmt->bindParam(':updated_at', $date_string);



        if($stmt->execute()){
            return $post;
        }else{
            // do sth
        }

    }

    /**
     * @param iEntityPost $post
     * @return bool
     */
    function delete(iEntityPost $post)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param iEntityPost $post
     * @return iEntityPost $post
     */
    function update(iEntityPost $post)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param ListCriteria $criteria
     * @return iEntityCollection
     */
    function getList(ListCriteria $criteria)
    {
        // TODO: Implement getList() method.
    }

}
