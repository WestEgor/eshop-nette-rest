<?php

namespace App\Form;

use App\Entity\UserDAO;
use Nette;
use Nette\Application\UI\Form;
use App\Model\User;
use Nette\Security\Passwords;


class RegistrationForm
{

    private Form $form;

    public function createRegistrationForm(): Form
    {
        $this->form = new Form();
        $this->form->addText('username', 'Uživatelské jméno')
            ->setRequired('Zadejte prosím Vaší uživatelské jméno.');


        $passwordInput = $this->form->addPassword('password', 'Heslo')
            ->setRequired('Zadejte prosím Vaší heslo.');

        $this->form->addPassword('password_confirm', 'Potvrzení hesla')
            ->setRequired('Pro potvrzení zadejte heslo.')
            ->addRule(
                $this->form::EQUAL,
                'Nepodařilo potvrdit heslo. Hesla se neshodují.',
                $passwordInput);

        $this->form->addEmail('email', 'Email:')
            ->setRequired('Zadejte prosím Váš email');

        $this->form->addSubmit('Register', 'Registrovat');

        return $this->form;
    }

    public function getForm(): Form
    {
        return $this->form;
    }
}
