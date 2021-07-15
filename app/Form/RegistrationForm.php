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
    private UserDAO $userDAO;

    /**
     * RegistrationForm constructor.
     * @param UserDAO $userDAO
     */
    public function __construct(UserDAO $userDAO)
    {
        $this->userDAO = $userDAO;
    }


    public function createRegistrationForm(): Form
    {
        $this->form = new Form();
        $this->form->addText('username', 'Username:')
            ->setRequired('Please enter your username.');

        $this->form->addPassword('password', 'Password:')
            ->setRequired('Please enter your password.');

        $this->form->addEmail('email', 'Email:')
            ->setRequired('Please enter your email');

        $this->form->addSubmit('Register', 'Registration');

        $this->form->onSuccess[] = [$this, 'registrationFormSucceeded'];

        return $this->form;
    }

    public function registrationFormSucceeded(): Form
    {
        return $this->form;
    }

    public function registrationFormSuccess(Form $form): void
    {
        $values = $form->getValues();
        $username = $values->username;
        $password = (new Passwords)->hash($values->password);
        $email = $values->email;
        $this->userDAO->create(new User($username, $password, $email));
    }
}
