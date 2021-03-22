<?php

namespace App\Service\User\UseCase;

use App\Entity\User;
use App\Repository\UserRepository;
use App\Service\User\UseCase\Request\UserRequest;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;


class RegisterNewUserUseCase
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;

    public function __construct(
        EntityManagerInterface $entityManager,
        UserRepository $repository,
        UserPasswordEncoderInterface $encoder
    ) {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
        $this->encoder = $encoder;
    }

    public function handle(UserRequest $request): User
    {
        $user = User::createFromRequest($request);
        $user->setPassword($this->encoder->encodePassword($user,$request->password));
        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return $user;
    }
}