<?php

namespace App\Service\Example;

use App\Repository\Example\PostRepository;
use Goulaheau\RestBundle\Service\RestService;

class PostService extends RestService
{
    public function __construct(PostRepository $repository)
    {
        parent::__construct($repository);
    }
}