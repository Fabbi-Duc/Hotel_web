<?php

namespace App\Http\Controllers\Api;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Mail\SendMail;
// use App\Mail\SendMailPark;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\TimeSheet;
use App\Models\UpdateTimesheet;

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
        if (!empty($data['start_time'])) {
            $list = $list->where('day', '>=', $data['start_time']);
        }

        if (!empty($data['end_time'])) {
            $list = $list->where('day', '<=', $data['end_time']);
        }

        if (empty($data['start_time']) && empty($data['end_time'])) {
            $start_time = date("Y-m-01", strtotime(now()));
            $list = $list->where('day', '>=', $start_time);
        }

        return [
            'success' => true,
            'data' => $list->paginate(10),
        ];
    }

    public function createUpdateTimesheet(Request $request)
    {
        $list = DB::table('update_timesheet')->where('time_sheet_id', $request->time_sheet_id)->first();
        if ($list) {
            return [
                'success' => false,
            ];
        };
        $timesheet = new UpdateTimesheet();
        $timesheet->start_time_update = $request->work_start_time;
        $timesheet->end_time_update = $request->work_end_time;
        $timesheet->description = $request->description;
        $timesheet->time_sheet_id = $request->time_sheet_id;
        $timesheet->status_update = 1;
        $timesheet->save();

        return [
            'success' => true
        ];
    }

    public function deleteUpdateTimeSheet($id)
    {
        DB::table('update_timesheet')->where('time_sheet_id', $id)->delete();

        return [
            'success' => true
        ];
    }

    public function updateUpdateTimesheet(Request $request)
    {
        DB::table('update_timesheet')->where('time_sheet_id', $request->id)->update([
            'start_time_update' => $request->work_start_time,
            'end_time_update' => $request->work_end_time,
            'description' => $request->description,
            'status_update' => 1
        ]);

        return [
            'success' => true
        ];
    }

    public function updateStatusTimeSheet(Request $request)
    {
        DB::table('update_timesheet')->where('id', $request->id)->update([
            'status' => $request->status,
        ]);

        return [
            'success' => true
        ];
    }

    public function getListUpdateTimeSheet(Request $request)
    {
        $list = DB::table('update_timesheet')->join('timesheet', 'update_timesheet.time_sheet_id', '=', 'timesheet.id');
        if (!empty($request->status)) {
            $list = $list->where('status', $request->status);
        }

        return [
            'success' => true,
            'data' => $list->paginate(10),
        ];
    }

    public function getInfoListUpdateTimeSheet(Request $request)
    {
        $list = DB::table('update_timesheet')->join('timesheet', 'update_timesheet.time_sheet_id', '=', 'timesheet.id')
            ->where('timesheet.user_id', $request->user_id);
        if (!empty($request->status)) {
            $list = $list->where('update_timesheet.status', $request->status);
        }

        return [
            'success' => true,
            'data' => $list->paginate(10),
        ];
    }

    public function successTimeSheet(Request $request)
    {
        DB::table('update_timesheet')->where('time_sheet_id', $request->id)->update(['status_update' => 3]);
        DB::table('timesheet')->where('id', $request->id)
            ->update(['time_check_in' => $request->start_time, 'time_check_out' => $request->end_time]);

        return [
            'success' => true,
        ];
    }

    public function refuseTimeSheet(Request $request)
    {
        DB::table('update_timesheet')->where('time_sheet_id', $request->id)->update(['status_update' => 2]);

        return [
            'success' => true,
        ];
    }

    public  function getTimeSheetMounth($id)
    {
        $date = getdate();
        $month = $date['mon'];
        $timesheet = DB::table('timesheet')->where('user_id', $id)->where('status', 2)->get();
        $total_time = 0;
        foreach ($timesheet as $time) {
            if ($time) {
                $month_time = date("m", strtotime($time->day));
                if ($month_time == $month) {
                    if ($time->time_check_in && $time->time_check_out) {
                        $first_date = strtotime($time->time_check_in);
                        $second_date = strtotime($time->time_check_out);
                        $datediff = abs($second_date - $first_date);
                        $total_time += $datediff;
                    }
                }
            }
        };
        $user = DB::table('users')->where('id', $id)->first();
        return [
            'success' => true,
            'total_time' => $total_time / 3600,
            'name' => $user->lastname,
            'salary' => $user->salary
        ];
    }

    public function getRoom($id)
    {
        $room_customer_id = DB::table('rooms_customers')->where('room_id', $id)->where('status', 2)->first();
        $list = [];
        $room = DB::table('rooms')->where('status', '<>', 3)->get();
        foreach ($room as $room_id) {
            if ($room_id->status == 1) {
                array_push($list, $room_id);
            } else if ($room_id->status == 2) {
                $list_room = DB::table('rooms_customers')->where('room_id', $room_id->id)->get();
                foreach ($list_room as $list_room_id) {
                    if ($list_room_id->start_time <= $room_customer_id->end_time) {
                        continue;
                    } else if ($list_room_id->end_time >= $room_customer_id->start_time) {
                        continue;
                    }
                    array_push($list, $room_id);
                }
            }
        }

        return [
            'success' => true,
            'list' => $list,
        ];
    }

    public function updateChangeRoom(Request $request)
    {
        // $room_customer_id = DB::table('rooms_customers')->where('room_id', $request->room_id)->where('status', 2)->first();
        DB::table('rooms_customers')->where('room_id', $request->room_id)->where('status', 2)->update(['room_id' => $request->id]);
        $code = DB::table('rooms')->where('id', $request->room_id)->first()->code_room;
        DB::table('rooms')->where('id', $request->id)->update(['status' => 3, 'code_room' => $code]);
        DB::table('rooms')->where('id', $request->room_id)->update(['code_room' => 'nguyenduc05021998@gmail.com']);
        DB::table('bills')->where('room_id', $request->room_id)->where('status', 2)->update(['room_id' => $request->id]);
        DB::table('room_service_food')->where('room_id', $request->room_id)->where('status', 1)->update(['room_id' => $request->id]);
        $list = DB::table('rooms_customers')->where('room_id', $request->room_id)->where('status', 1)->first();
        if (!$list) {
            DB::table('rooms')->where('id', $request->room_id)->update(['status' => 1]);
        } else {
            DB::table('rooms')->where('id', $request->room_id)->update(['status' => 2]);
        }
        return [
            'success' => true,
        ];
    }
}
