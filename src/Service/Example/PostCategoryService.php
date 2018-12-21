<?php

namespace App\Service\Example;

use App\Entity\Example\PostCategory;
use App\Repository\Example\PostCategoryRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Goulaheau\RestBundle\Service\RestService;
use Goulaheau\RestBundle\Utils\RestSerializer;
use Goulaheau\RestBundle\Utils\RestValidator;

class PostCategoryService extends RestService
{
    public function __construct(
        PostCategoryRepository $repository,
        RestSerializer $serializer,
        RestValidator $validator,
        ObjectManager $manager
    ) {
        parent::__construct(PostCategory::class, $repository, $serializer, $validator, $manager);
    }
}
