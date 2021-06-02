<?php

namespace App\Repositories\User;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getListUsers($data);

    public function getInfoUser($id);

    public function createUser($data);

    public function updateUser($data, $id);

    public function deleteUser($id);

    public function createFood($data);

    public function updateFood($data);

    public function listFood($data);

    public function deleteFood($id);

    public function getInfoFood($id);

    public function createPark($data);

    public function getCountUser();
}
