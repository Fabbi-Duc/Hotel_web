<?php

namespace App\Http\Controllers\Api;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Mail\SendMail;
// use App\Mail\SendMailPark;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\TimeSheet;

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

    public function checkTimeSheet($id)
    {
        $data = DB::table('timesheet')->where('user_id', $id)->where('status', 1)->first();
        if ($data) {
            $start_time = DB::table('timesheet')->where('user_id', $id)->where('status', 1)->first()->time_check_in;
            if ($start_time) {
                return [
                    'data' => true,
                    'check_in' => true,
                ];
            }
            return [
                'data' => true,
                'check_in' => false,
            ];
        }

        return [
            'data' => false,
        ];
    }

    public function checkIn(Request $request)
    {
        // dd($request->all());
        DB::table('timesheet')->where('user_id', $request->user_id)
                              ->where('status', 1)
                              ->update(['time_check_in' => $request->time]);

        return [
            'success' => true
        ];
    }

    public function checkOut(Request $request)
    {
        // dd($request->all());
        DB::table('timesheet')->where('user_id', $request->user_id)
                              ->where('status', 1)
                              ->update(['time_check_out' => $request->time]);

        return [
            'success' => true
        ];
    }

    public function getTimeSheet(Request $request)
    {
        $data = $request->all();
        $list = DB::table('timesheet')->where('user_id', $data['user_id']);
        if(!empty($data['start_time'])) {
            $list = $list->where('day', '>=',$data['start_time']);
        }

        if(!empty($data['end_time'])) {
            $list = $list->where('day', '<=',$data['end_time']);
        }

        if(empty($data['start_time']) && empty($data['end_time'])) {
            $start_time = date("Y-m-01", strtotime(now()));
            $list = $list->where('day', '>', $start_time);
        }

        return [
            'success' => true,
            'data' => $list->get(),
        ];
    }
}
