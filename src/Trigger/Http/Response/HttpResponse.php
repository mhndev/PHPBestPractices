<?php
namespace mhndev\bestPractice\Trigger\Http\Response;

use Psr\Http\Message\ResponseInterface;

/**
 * Class HttpResponse
 * @package mhndev\bestPractice\Trigger\Http\Response
 */
class HttpResponse
{

    /**
     * @param ResponseInterface $response
     * @param \IteratorAggregate $data
     * @return ResponseInterface
     */
    static function toJson(ResponseInterface $response, \IteratorAggregate $data)
    {
        return $response;
    }


    /**
     * @param ResponseInterface $response
     * @param \IteratorAggregate $data
     * @return ResponseInterface
     */
    static function toXml(ResponseInterface $response, \IteratorAggregate $data)
    {
        return $response;
    }



}
