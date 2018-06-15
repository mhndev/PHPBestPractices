<?php
namespace mhndev\bestPractice\Trigger\Http\Service;

use mhndev\bestPractice\App\Entity\EntityUser;
use Psr\Http\Message\ServerRequestInterface;

/**
 * This class should have a oauth client in it
 * when it get the request It send user identifier sent by request (for e.x. user access token)
 * and ask for whether access token is valid and if so gets user information
 *
 * Class Auth
 * @package mhndev\bestPractice\Trigger\Http\Service
 */
class Auth
{

    /**
     * @param ServerRequestInterface $request
     * @return EntityUser
     */
    function getLoggedInUser(ServerRequestInterface $request)
    {
        return new EntityUser;
    }

}
