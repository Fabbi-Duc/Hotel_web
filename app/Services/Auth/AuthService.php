<?php

namespace App\Services\Auth;
// use App\Models\Customers;

class AuthService implements AuthServiceInterface
{
    private $guard;
    private $customers;

    // public function model()
    // {
    //     return Customers::class;
    // }

    public function __construct()
    {
        $this->guard = auth()->guard('api');
        $this->customers = auth()->guard('customers');
    }

    public function signIn($data)
    {
        // 
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];
        if (!$token = $this->guard->attempt($credentials)) {
            return [
                'success' => false,
            ];
        }

        return [
            'success' => true,
            'data' => $this->respondWithToken($token)
        ];
    }

    public function loginCustomer($data)
    {
        // 
        $credentials = [
            'email' => $data['email'],
            'password' => $data['password']
        ];
        // dd($credentials);
        if (!$token = $this->customers->attempt($credentials)) {
            return [
                'success' => false,
            ];
        }

        return [
            'success' => true,
            'data' => $this->token($token)
        ];
    }


    private function token($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->customers->factory()->getTTL() * 60
        ];
    }

    private function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard->factory()->getTTL() * 60
        ];
    }

    public function account()
    {
        return $this->guard->user();
    }

    public function accountCustomer() {
        return $this->customers->user();
    }
}
