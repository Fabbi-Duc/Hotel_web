<?php

namespace App\Services\Auth;

interface AuthServiceInterface
{
    public function signIn($data);

    public function loginCustomer($data);

    public function account();

    public function accountCustomer();
}
