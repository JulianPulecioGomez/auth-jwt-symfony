<?php

namespace App\Service\User\UseCase\Request;

use App\Util\RequestDTOInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints as Assert;

class ApiRequest implements RequestDTOInterface
{
    public function __construct(Request $request)
    {
        $jsonParameters = json_decode($request->getContent(), true);

        foreach ($jsonParameters as $key => $parameter) {
            $this->$key = $parameter ?? null;
        }
    }
}

