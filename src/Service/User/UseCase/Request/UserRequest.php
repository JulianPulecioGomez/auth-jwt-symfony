<?php

namespace App\Service\User\UseCase\Request;

use App\Util\RequestDTOInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;
use App\Service\User\UseCase\Request\Validation\UniqueEmailConstraint as UserEmailConstraint;

/**
 * @author Julian Pulecio
 * @UserEmailConstraint()
 */
class UserRequest extends ApiRequest implements RequestDTOInterface
{
    /**
     * @var string
     * @Assert\NotBlank
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email."
     * )
     */
    public $email;


    /**
     * @var string
     * @Assert\NotBlank
     */
    public $password;

    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}

