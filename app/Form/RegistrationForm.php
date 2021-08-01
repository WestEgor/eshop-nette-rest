<?php

namespace App\Form;

use Nette;
use Nette\Application\UI\Form as NetteForm;

class RegistrationForm implements Form
{

    public function createForm(): NetteForm
    {
        $form = new NetteForm();
        $form->addText('username', 'Uživatelské jméno')
            ->setRequired('Zadejte prosím Vaší uživatelské jméno.');


        $passwordInput = $form->addPassword('password', 'Heslo')
            ->setRequired('Zadejte prosím Vaší heslo.');

        $form->addPassword('password_confirm', 'Potvrzení hesla')
            ->setRequired('Pro potvrzení zadejte heslo.')
            ->addRule(
                $form::EQUAL,
                'Nepodařilo potvrdit heslo. Hesla se neshodují.',
                $passwordInput);

        $form->addEmail('email', 'Email:')
            ->setRequired('Zadejte prosím Váš email');

        $form->addSubmit('Register', 'Registrovat');

        return $form;
    }
}
