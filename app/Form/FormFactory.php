<?php

namespace App\Form;

class FormFactory
{

    const REGISTRATION_FORM = 1;
    const LOG_IN_FORM = 2;

    public function getCreationForm(int $mode): ?Form
    {
        switch ($mode) {
            case (self::REGISTRATION_FORM):
                return new RegistrationForm();
            case (self::LOG_IN_FORM):
                return new LogInForm();
        }
        return null;
    }
}
