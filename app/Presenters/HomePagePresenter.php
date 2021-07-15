<?php


namespace App\Presenters;

use Nette;
use Nette\Application\UI\Presenter;
use App\Entity\CategoryDAO;

class HomePagePresenter extends Presenter
{
    private CategoryDAO $categoryDAO;

    /**
     * CategoryPresenter constructor.
     * @param CategoryDAO $categoryDAO
     */
    public function __construct(CategoryDAO $categoryDAO)
    {
        parent::__construct();
        $this->categoryDAO = $categoryDAO;
    }

    public function startup()
    {
        parent::startup();
        $this->template->setFile(__DIR__ . '/templates/Homepage/home.latte');
    }

    public function renderHome(): void
    {
        $this->template->categories = $this->categoryDAO->readAll();
    }
}
