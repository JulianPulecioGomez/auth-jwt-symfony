<?php

namespace App\Controller;

use App\Service\User\UseCase\RegisterNewUserUseCase;
use App\Service\User\UseCase\Request\UserRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterUserController extends AbstractController
{
    public function __invoke(UserRequest $request, RegisterNewUserUseCase $useCase)
    {
        $useCase->handle($request);
    }
}
