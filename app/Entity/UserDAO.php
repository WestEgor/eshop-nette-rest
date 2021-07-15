<?php


namespace App\Entity;


use Nette\Database\ResultSet;

class UserDAO extends AbstractDAO implements InterfaceDAO
{

    public function readAll(): array|false
    {
        // TODO: Implement readAll() method.
    }

    public function read(int $key): object|false
    {
        // TODO: Implement read() method.
    }

    public function create(object $object): bool
    {
        $newUser = $this->database->table('users')->insert([
            'username' => $object->getUserName(),
            'password' => $object->getPassword(),
            'role' => 'user',
            'email' => $object->getEmail()
        ]);

        return is_null($newUser);
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