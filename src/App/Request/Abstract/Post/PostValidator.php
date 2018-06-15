<?php
namespace mhndev\bestPractice\App\Request\Post;

use mhndev\bestPractice\App\Entity\Contract\iEntityPost;

/**
 * Class PostValidator
 * @package mhndev\bestPractice\App\Request\Post
 */
class PostValidator
{

    /**
     * @var array
     */
    protected $message;


    /**
     *
     * possible validation error stack
     *
     * [
     *      'errors' => [
     *          'title' => 'title can't be empty',
     *          'body'  => 'body can't be empty',
     *          'tags'  => [
     *              'by_key' => [
     *                  0 => 'tag length can't be less than 3 characters'
     *              ],
     *              'by_value' => [
     *                  'ma' => 'tag length can't be less than 3 characters'
     *              ]
     *
     *          ]
     *      ]
     * ]
     *
     * this method return true if validation succeeds and return validation error messages
     * if it fails
     *
     * @param iEntityPost $post
     * @return array|bool
     */
    function validate(iEntityPost $post)
    {
        if(
            ! $this->validateTitle($post->getTitle()) ||
            ! $this->validateBody($post->getBody()) ||
            ! $this->validateTags($post->getTags())
        ){
            return $this->message;
        }

        return true;
    }


    /**
     * @param string $title
     * @return bool
     */
    private function validateTitle(string $title)
    {
        if(empty($title)) {
            $this->message['title'] = 'title can\'t be empty';

            return false;
        }

        return true;
    }


    /**
     * @param string $body
     * @return bool
     */
    private function validateBody(string $body)
    {
        if(empty($title)) {
            $this->message['body'] = 'title can\'t be empty';

            return false;
        }

        return true;
    }


    /**
     * @param array $tags
     * @return bool
     */
    private function validateTags(array $tags)
    {
        $valid = true;

        foreach ($tags as $key => $tag){
            if ( strlen($tag) < 3 ){
                $valid = false;

                $this->message['tags']['by_key'][$key] = 'tag length can\'t be less than 3 characters';
                $this->message['tags']['by_value'][$tag] = 'tag length can\'t be less than 3 characters';
            }
        }

        return $valid;

    }



}
