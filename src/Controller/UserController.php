<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Goulaheau\RestBundle\Controller\RestController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserController
 *
 * @package App\Controller
 *
 *          TODO: changer les exceptions en json
 * @Route("/user", defaults={"_format": "json"})
 */
class UserController extends RestController
{
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }
}
