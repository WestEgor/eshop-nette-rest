<?php

namespace App\Form;

use Nette\Application\UI\Form as NetteForm;

interface Form
{

    public function createForm(): NetteForm;

}
