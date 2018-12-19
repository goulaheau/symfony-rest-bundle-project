<?php

namespace App\Controller\Example;

use App\Entity\Example\Post;
use App\Service\Example\PostService;
use Doctrine\Common\Persistence\ObjectManager;
use Goulaheau\RestBundle\Controller\RestController;
use Goulaheau\RestBundle\Utils\RestSerializer;
use Goulaheau\RestBundle\Utils\RestValidator;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/example/post")
 */
class PostController extends RestController
{
    public function __construct(
        PostService $service,
        ObjectManager $manager,
        RestValidator $validator,
        RestSerializer $serializer
    ) {
        parent::__construct(Post::class, $service, $manager, $validator, $serializer);
    }
}
