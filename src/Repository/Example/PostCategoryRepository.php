<?php

namespace App\Repository\Example;

use App\Entity\Example\PostCategory;
use Goulaheau\RestBundle\Repository\RestRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PostCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method PostCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method PostCategory[]    findAll()
 * @method PostCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PostCategoryRepository extends RestRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct(PostCategory::class, $registry);
    }
}
