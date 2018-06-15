<?php

return [
    ['GET', '/', function() { echo 'hello world'; exit(0); } ],
    ['POST', '/post', \mhndev\bestPractice\Trigger\Http\Endpoint\Post\CreatePost::class],
];
