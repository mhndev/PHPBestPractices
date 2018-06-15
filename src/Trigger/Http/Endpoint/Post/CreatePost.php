<?php
namespace mhndev\bestPractice\Trigger\Http\Endpoint\Post;

use mhndev\bestPractice\App\Action\Post\ActionCreatePost;
use mhndev\bestPractice\App\Action\Post\ActionNotifyUsersForNewPost;
use mhndev\bestPractice\App\Exception\ExceptionAccessDenied;
use mhndev\bestPractice\Trigger\Http\Exception\ExceptionValidationEntity;
use mhndev\bestPractice\Trigger\Http\Request\PostRequest;
use mhndev\bestPractice\Trigger\Http\Response\HttpResponse;
use mhndev\bestPractice\Trigger\Http\Service\Auth;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Class CreatePost
 * @package mhndev\bestPractice\Trigger\Http\Post
 */
class CreatePost
{

    /**
     * @var ActionCreatePost
     */
    protected $actionCreatePost;

    /**
     * @var ActionNotifyUsersForNewPost
     */
    protected $actionNotifyUsersForNewPost;

    /**
     * @var PostRequest
     */
    protected $postRequest;

    /**
     * @var Auth
     */
    protected $authService;

    /**
     * CreatePost constructor.
     * @param ActionCreatePost $actionCreatePost
     * @param ActionNotifyUsersForNewPost $actionNotifyUsersForNewPost
     * @param PostRequest $postRequest
     * @param Auth $auth
     */
    function __construct(
         ActionCreatePost $actionCreatePost
        ,ActionNotifyUsersForNewPost $actionNotifyUsersForNewPost
        ,PostRequest $postRequest
        ,Auth $auth
    )
    {
        $this->actionCreatePost = $actionCreatePost;
        $this->actionNotifyUsersForNewPost = $actionNotifyUsersForNewPost;
        $this->postRequest = $postRequest;
        $this->authService = $auth;
    }


    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @return ResponseInterface
     * @throws ExceptionAccessDenied
     * @throws ExceptionValidationEntity
     */
    function __invoke(ServerRequestInterface $request, ResponseInterface $response)
    {
        # do authorization check
        $user = $this->authService->getLoggedInUser($request);

        if($user->hasNotAccessTo('CreatePost')) {
            throw new ExceptionAccessDenied;
        }

        # do validation check
        if( $this->postRequest->isNotValid($request) ) {
            throw new ExceptionValidationEntity($this->postRequest->getErrorMessages());
        }

        # call business logic actions
        $persistedPost = $this->actionCreatePost->__invoke($this->postRequest->getPost());
        $this->actionNotifyUsersForNewPost->__invoke($persistedPost);

        return HttpResponse::toJson($response, $persistedPost);
    }


}
