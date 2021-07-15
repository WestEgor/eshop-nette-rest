<?php

namespace App\Entity;

use App\Model\Category;
use Nette;
use Nette\Database\ResultSet;

class CategoryDAO extends AbstractDAO implements InterfaceDAO
{

    /**
     * @return object|false
     */
    public function readAll(): array|false
    {
        $categoryResultSet = $this->database->query('SELECT * FROM categories');

        if (is_null($categoryResultSet)) {
            return false;
        }

        $categories = [];

        foreach ($categoryResultSet as $category) {
            $id = (int)$category->id;
            $name = (string)$category->name;
            $categories[] = new Category($id, $name);
        }

        return $categories;
    }

    public function read(int $key): object|false
    {
        $category = $this->database->table('categories')->get($key);
        if (is_null($category)) {
            return false;
        }
        $id = (int)$category->id;
        $name = (string)$category->name;
        return new Category($id, $name);
    }

    public function create(object $object): bool
    {
        // TODO: Implement create() method.
    }

    public function update(object $object): bool
    {
        // TODO: Implement update() method.
    }

    public function delete(int $key): bool
    {
        // TODO: Implement delete() method.
    }
}