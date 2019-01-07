<?php

namespace App\Controller\Example;

use App\Entity\Example\Post;
use App\Service\Example\PostService;
use Goulaheau\RestBundle\Controller\RestController;
use Goulaheau\RestBundle\Core\RestSerializer;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/example/post")
 */
class PostController extends RestController
{
    public function __construct(PostService $service)
    {
        parent::__construct(Post::class, $service);
    }
}
