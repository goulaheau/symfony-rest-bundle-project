<?php

namespace App\Controller\Example;

use App\Entity\Example\Post;
use App\Repository\Example\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Goulaheau\RestBundle\Controller\RestController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/example/post")
 */
class PostController extends RestController
{
    public function __construct(PostRepository $repository, EntityManagerInterface $manager, ValidatorInterface $validator)
    {
        parent::__construct(Post::class, $repository, $manager, $validator);
    }
}
