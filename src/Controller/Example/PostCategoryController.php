<?php

namespace App\Controller\Example;

use App\Entity\Example\PostCategory;
use App\Repository\Example\PostCategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Goulaheau\RestBundle\Controller\RestController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/example/post-category")
 */
class PostCategoryController extends RestController
{
    public function __construct(PostCategoryRepository $repository, EntityManagerInterface $manager, ValidatorInterface $validator)
    {
        parent::__construct(PostCategory::class, $repository, $manager, $validator);
    }
}
