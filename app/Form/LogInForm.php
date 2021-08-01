<?php

namespace App\Form;

use Nette\Application\UI\Form as NetteForm;

class LogInForm implements Form
{

    public function createForm(): NetteForm
    {
        $form = new NetteForm();
        $form->addText('username', 'Uživatelské jméno')
            ->setRequired('Zadejte prosím Vaší uživatelské jméno.');

        $form->addPassword('password', 'Heslo')
            ->setRequired('Zadejte prosím Vaší heslo.');

        $form->addSubmit('login', 'Přihlásit se');

        return $form;
    }
}