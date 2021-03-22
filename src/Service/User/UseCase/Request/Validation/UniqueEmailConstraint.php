<?php
namespace App\Service\User\UseCase\Request\Validation;

use Symfony\Component\Validator\Constraint;

/**
* @Annotation
*/
class UniqueEmailConstraint extends Constraint
{
    public $message = 'The "{{ string }}" must be unique';

    public function getTargets()
    {
        return parent::CLASS_CONSTRAINT;
    }
}