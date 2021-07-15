<?php

namespace App\Entity;

use Nette;
use Nette\Database\Explorer;

class AbstractDAO
{
    protected Explorer $database;

    /**
     * AbstractDAO constructor.
     * @param Explorer $database
     */
    final public function __construct(Explorer $database)
    {
        $this->database = $database;
    }
}
