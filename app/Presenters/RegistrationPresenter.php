<?php


namespace App\Presenters;

use App\Entity\UserDAO;
use App\Form\RegistrationForm;
use App\Model\User;
use Closure;
use Nette;
use Nette\Application\UI\Form;
use Nette\Application\UI\Presenter;
use Nette\Security\Passwords;

class RegistrationPresenter extends Presenter
{
    private RegistrationForm $registrationForm;
    private UserDAO $userDAO;

    /**
     * RegistrationPresenter constructor.
     * @param RegistrationForm $registrationForm
     * @param UserDAO $userDAO
     */
    public function __construct(RegistrationForm $registrationForm, UserDAO $userDAO)
    {
        parent::__construct();
        $this->registrationForm = $registrationForm;
        $this->userDAO = $userDAO;
    }

    public function startup()
    {
        parent::startup();
        $this->template->setFile(__DIR__ . '/templates/Registration/default.latte');
    }

    public function createComponentRegistrationForm(): Form
    {
        $form = $this->registrationForm->createRegistrationForm();

        $form->onSuccess[] = function () use ($form) {
            $this->registrationForm->registrationFormSuccess($form);
        };
        $form->onSuccess[] = function () {
            $this->redirect('Homepage:default');
        };

        return $form;
    }


}
