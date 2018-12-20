<?php

namespace App\Controller\Example;

use App\Entity\Example\Post;
use App\Service\Example\PostService;
use Goulaheau\RestBundle\Controller\RestController;
use Goulaheau\RestBundle\Utils\RestSerializer;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/example/post")
 */
class PostController extends RestController
{
    public function __construct(PostService $service, RestSerializer $serializer)
    {
        parent::__construct(Post::class, $service, $serializer);
    }
}
