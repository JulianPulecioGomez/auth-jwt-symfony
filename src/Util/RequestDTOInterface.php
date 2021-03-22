<?php
namespace App\Util;

use Symfony\Component\HttpFoundation\Request;

interface RequestDTOInterface
{
    public function __construct(Request $request);
}