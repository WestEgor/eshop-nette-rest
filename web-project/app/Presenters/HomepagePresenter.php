<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette\Application\UI\Presenter;
use Nette\Database\Explorer;

final class HomepagePresenter extends Presenter
{
    private Explorer $connection;

    public function __construct(Explorer $connection)
    {
        $this->connection = $connection;
    }

    public function renderShow(): void
    {
        $this->template->users = $this->connection->table('users')
            ->order('username DESC');
    }
}
