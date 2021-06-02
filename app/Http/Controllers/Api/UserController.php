<?php

namespace App\Http\Controllers\Api;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Mail\SendMail;
// use App\Mail\SendMailPark;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class UserController extends ApiController
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function getListUsers(Request $request)
    {
        $result = $this->userRepository->getListUsers($request);

        return $this->sendSuccess($result);
    }

    public function sendMail(Request $request)
    {
        $data = $request->all();
        DB::table('rooms')->where('id', $data['id'])->update(['code_room' => $data['code']]);
        Mail::to($data['email'])->send(new SendMail($data['imgSrc']));
    }

    public function getInfoUser($id)
    {
        $result = $this->userRepository->getInfoUser($id);
        return $result;
    }

    public function deleteUser($id)
    {
        $result = $this->userRepository->deleteUser($id);
        return $result;
    }

    public function createUser(Request $request)
    {
        $data = $request->all();
        $result = $this->userRepository->createUser($data);

        return $result;
    }

    public function updateUser(Request $request)
    {
        $data = $request->all();
        $id = $request->only('id');
        $result = $this->userRepository->updateUser($data, $id);

        return $result;
    }

    public function createFood(Request $request)
    {
        $data = $request->all();
        $result = $this->userRepository->createFood($data);

        return $result;
    }

    public function updateFood(Request $request)
    {
        $data = $request->all();
        $result = $this->userRepository->updateFood($data);

        return $result;
    }

    public function listFood(Request $request)
    {
        $data = $request->all();
        $result = $this->userRepository->listFood($data);

        return $result;
    }

    public function getInfoFood($id)
    {
        $result = $this->userRepository->getInfoFood($id);

        return $result;
    }

    public function deleteFood($id)
    {
        $result = $this->userRepository->deleteFood($id);

        return $result;
    }

    public function createPark(Request $request)
    {
        $result = $this->userRepository->createPark($request->all());
        return $result;
    }

    public function getCountUser()
    {
        $result = $this->userRepository->getCountUser();
        return $result;
    }
}
