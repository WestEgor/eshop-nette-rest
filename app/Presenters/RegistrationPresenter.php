<?php


namespace App\Presenters;

use App\Entity\UserDAO;
use App\Form\FormFactory;
use App\Form\RegistrationForm;
use App\Model\User;
use Closure;
use Nette;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use Nette\Security\Passwords;

class RegistrationPresenter extends Presenter
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
        $this->template->setFile(__DIR__ . '/templates/Registration/default.latte');
    }

    public function createComponentRegistrationForm(): Form
    {
        $form = $this->formFactory->getCreationForm(FormFactory::REGISTRATION_FORM)->createForm();
        $form->onSuccess[] = [$this, 'registrationFormSucceeded'];

        $form->onSuccess[] = function () {
            $this->redirect('Homepage:default');
        };

        return $form;
    }

    public function registrationFormSucceeded(): void
    {
        $values = $this->getComponent('registrationForm')->getValues();
        $username = $values->username;
        $password = (new Passwords)->hash($values->password);
        $email = $values->email;
        $this->userDAO->create(new User($username, $password, $email));
        $this->flashMessage('Byl jste úspěšně registrován');
    }
}
