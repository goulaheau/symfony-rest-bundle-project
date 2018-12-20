<?php

namespace App\Service\Example;

use App\Entity\Example\Post;
use App\Repository\Example\PostRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Goulaheau\RestBundle\Service\RestService;
use Goulaheau\RestBundle\Utils\RestSerializer;
use Goulaheau\RestBundle\Utils\RestValidator;

class PostService extends RestService
{
    public function __construct(
        PostRepository $repository,
        RestSerializer $serializer,
        RestValidator $validator,
        ObjectManager $manager
    ) {
        parent::__construct(Post::class, $repository, $serializer, $validator, $manager);
    }
}
