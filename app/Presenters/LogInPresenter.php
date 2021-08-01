<?php

namespace App\Presenters;

use App\Entity\UserDAO;
use App\Form\FormFactory;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;

class LogInPresenter extends Presenter
{

    private FormFactory $formFactory;
    private UserDAO $userDAO;

    /**
     * RegistrationPresenter constructor.
     * @param FormFactory $formFactory
     * @param UserDAO $userDAO
     */
    public function __construct(FormFactory $formFactory, UserDAO $userDAO)
    {
        parent::__construct();
        $this->formFactory = $formFactory;
        $this->userDAO = $userDAO;
    }

    public function startup()
    {
        parent::startup();
        $this->template->setFile(__DIR__ . '/templates/Login/default.latte');
    }

    public function createComponentLogInForm(): Form
    {
        $form = $this->formFactory->getCreationForm(FormFactory::LOG_IN_FORM)->createForm();
        $form->onSuccess[] = [$this, 'logInFormSucceeded'];

        /*$form->onSuccess[] = function () {
            $this->redirect('Homepage:default');
        };*/

        return $form;
    }

    public function logInFormSucceeded(): void
    {
        $values = $this->getComponent('logInForm')->getValues();
        $username = $values->username;
        $password = $values->password;

        $this->flashMessage('Byl jste úspěšně registrován');
    }

}