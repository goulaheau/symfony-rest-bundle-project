<?php

namespace App\Controller\Example;

use App\Entity\Example\PostCategory;
use App\Service\Example\PostCategoryService;
use Doctrine\Common\Persistence\ObjectManager;
use Goulaheau\RestBundle\Controller\RestController;
use Goulaheau\RestBundle\Utils\RestSerializer;
use Goulaheau\RestBundle\Utils\RestValidator;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/example/post-category")
 */
class PostCategoryController extends RestController
{
    public function __construct(
        PostCategoryService $service,
        ObjectManager $manager,
        RestValidator $validator,
        RestSerializer $serializer
    ) {
        parent::__construct(PostCategory::class, $service, $manager, $validator, $serializer);
    }
}
