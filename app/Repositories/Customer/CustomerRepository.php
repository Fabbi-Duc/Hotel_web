<?php

namespace App\Repositories\Customer;

use App\Models\Customers;
use App\Models\RoomsCustomer;
use App\Models\Bills;
use App\Models\RoomFoods;
use App\Models\RoomServiceFood;
use App\Models\RoomServicePark;
use App\Repositories\RepositoryAbstract;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class CustomerRepository extends RepositoryAbstract implements CustomerRepositoryInterface
{
    public function model()
    {
        return Customers::class;
    }

    public function registerCustomer($data)
    {
        try {
            $room = new Customers;
            $room->email = $data['email'];
            $room->password = bcrypt($data['password']);
            $room->name = $data['name'];
            $room->gender = $data['gender'];
            $room->phone = $data['phone'];
            $room->identity_card = $data['identity_card'];
            $room->birthday = $data['birthday'];
            $room->save();
            return [
                'success' => true
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getListCustomer($data)
    {
        try {
            $list = $this->model;
            $perPage = $data['perPage'];
            $name = $data['name'];

            if ($data['name']) {
                $list->where('name', 'LIKE', "%$name%");
            }

            return [
                'success' => true,
                'data' => $list->paginate($perPage)
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function bookRoom($data, $id, $time)
    {
        try {
            $start_time = $time['start_time'];
            $end_time = $time['end_time'];
            $dataRoom = DB::table('rooms_customers')->where('room_id', $id['id'])->get();
            foreach ($dataRoom as $room) {
                if ($room->start_time <= $start_time && $room->end_time >= $start_time) {

                    return [
                        'success' => false,
                        'message' => 'Start Time not suitable'
                    ];
                } else if ($room->start_time <= $end_time && $room->end_time >= $end_time) {

                    return [
                        'success' => false,
                        'message' => 'End Time not suitable'
                    ];
                } else if ($room->start_time >= $start_time && $room->end_time <= $end_time) {
                    return [
                        'success' => false,
                        'message' => 'Start Time and End Time not suitable'
                    ];
                }
            }

            $room = new RoomsCustomer;
            $bill = new Bills;
            $t = $this->model->where('email', $data['email'])->first();
            if (!$t) {
                $data['password'] = bcrypt($data['password']);
                $customer = $this->model->create($data);
                $room->customer_id = $customer->get()->last()->id;
            } else {
                $room->customer_id = $this->model->where('email', $data['email'])->first()->id;
            }
            $room->status = 2;
            $room->room_id = $id['id'];
            $room->start_time = $time['start_time'];
            $room->end_time = $time['end_time'];
            $room->save();

            $bill->room_id = $id['id'];
            $bill->start_time = $time['start_time'];
            $bill->end_time = $time['end_time'];
            $bill->status = 2;
            $bill->save();

            DB::table('rooms')->where('id', $id['id'])->update(['status' => 3]);


            return [
                'success' => true,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function bookRoomOnline($data, $id, $time)
    {
        try {
            $start_time = $time['start_time'];
            $end_time = $time['end_time'];
            $dataRoom = DB::table('rooms_customers')->where('room_id', $id['id'])->get();
            foreach ($dataRoom as $room) {
                if ($room->start_time <= $start_time && $room->end_time >= $start_time) {

                    return [
                        'success' => false,
                        'message' => 'Start Time not suitable'
                    ];
                } else if ($room->start_time <= $end_time && $room->end_time >= $end_time) {

                    return [
                        'success' => false,
                        'message' => 'End Time not suitable'
                    ];
                } else if ($room->start_time >= $start_time && $room->end_time <= $end_time) {
                    return [
                        'success' => false,
                        'message' => 'Start Time and End Time not suitable'
                    ];
                }
            }

            $room = new RoomsCustomer;
            $bill = new Bills;
            $room->customer_id = $data['user_id'];
            $room->status = 1;
            $room->room_id = $id['id'];
            $room->start_time = $time['start_time'];
            $room->end_time = $time['end_time'];
            $room->save();

            $bill->room_id = $id['id'];
            $bill->start_time = $time['start_time'];
            $bill->end_time = $time['end_time'];
            $bill->status = 1;
            $bill->save();

            $room = DB::table('rooms')->where('id', $id['id'])->first();
            if($room->status == 1) {
                DB::table('rooms')->where('id', $id['id'])->update(['status' => 2]);
            };


            return [
                'success' => true,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getInfoRoomCustomer($id)
    {
        try {
            $room = DB::table('rooms_customers')->where('room_id', $id)->where('status', 1)->get();

            foreach ($room as $data) {
                $name = $this->model->where('id', $data->customer_id)->get('name');
                $data->name = $name[0]->name;
            }

            return [
                'success' => true,
                'data' => $room
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getInfoCustomer($room_customer_id)
    {
        try {
            $customer = DB::table('rooms_customers')->find($room_customer_id);
            $data = $this->model->find($customer->customer_id);
            $data->start_time = $customer->start_time;
            $data->end_time = $customer->end_time;
            return [
                'success' => true,
                'data' => $data,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function updateBookRoom($room_customer_id)
    {
        try {
            $customer = DB::table('rooms_customers')->find($room_customer_id);
            DB::table('rooms')->where('id', $customer->room_id)->update(['status' => 3]);
            DB::table('rooms_customers')->where('id', $room_customer_id)->update(['status' => 2]);
            DB::table('bills')->where('id', $customer->room_id)->update(['status' => 2]);
            return [
                'success' => true,
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function pay($room_id)
    {
        try {
            $room = DB::table('rooms_customers')->where('room_id', $room_id)->where('status', 2)->first();
            $room_type = DB::table('rooms')->where('id', $room_id)->first();
            $cost = DB::table('room_types')->where('id', $room_type->room_type_id)->first();
            $first_date = strtotime($room->start_time);
            $second_date = strtotime($room->end_time);
            $datediff = abs($second_date - $first_date);
            if ($datediff <= 1) {
                $data = $cost->cost_first_hour;
            } else {
                $data = $cost->cost_first_hour + (($datediff - 1) / (3600)) * $cost->cost_next_hour;
            };
            $food = DB::table('room_service_food')->where('room_id', $room_id)->where('status', 1)->first();
            $money = 0;
            if ($food) {
                $food_list = DB::table('room_foods')->where('room_service_food_id', $food->id)->get();
                foreach ($food_list as $list) {
                    $money += DB::table('foods')->find($list->food_id)->cost * $list->count;
                }
                $room_service_id = DB::table('room_service_food')->where('room_id', $room_id)->where('status', 1)->first();
                DB::table('room_service_food')->where('room_id', $room_id)->where('status', 1)->update(['status' => 3, 'cost' => $data + $money]);
                DB::table('room_foods')->where('room_service_food_id', $room_service_id->id)->update(['status' => 3]);
            }
            DB::table('rooms_customers')->where('room_id', $room_id)->where('status', 2)->update(['status' => 3]);
            DB::table('rooms')->where('id', $room_id)->update(['status' => 1]);
            DB::table('bills')->where('room_id', $room_id)->where('status', 2)->update(['status' => 3]);
            return [
                'success' => true,
                'data' => $data,
                'money' => $money
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function food($data)
    {
        // dd($data);
        $id = $data['id'];
        $room = DB::table('rooms_customers')->where('room_id', $id)->where('status', 2)->first();
        $room_food = DB::table('room_service_food')->where('room_id', $id)->where('status', 1)->first();
        if ($room_food) {
            foreach ($data['food'] as $food_id) {
                $object = json_decode($food_id);
                $food_room = new RoomFoods;
                $food_room->food_id = $object->id;
                $food_room->count = $object->quantity;
                $food_room->room_service_food_id = $room_food->id;
                $food_room->status = 1;

                $food_room->save();
            }
            DB::table('room_service_food')->where('room_id', $id)->where('status', 1)->update(['status' => 2]);
        } else {
            $service_food = new RoomServiceFood;
            $service_food->room_id = $room->room_id;
            $service_food->start_time = $room->start_time;
            $service_food->end_time = $room->end_time;
            $service_food->status = 1;
            $service_food->cost = 0;
            $service_food->save();


            $service = DB::table('room_service_food')->where('room_id', $service_food->room_id)->get()->last()->id;
            foreach ($data['food'] as $food_id) {
                $food_room = new RoomFoods;
                $object = json_decode($food_id);
                $food_room->food_id = $object->id;
                $food_room->count = $object->quantity;
                $food_room->room_service_food_id = $service;
                $food_room->status = 1;
                $food_room->save();
            }
        }

        return [
            'succuss' => true
        ];
    }

    public function getFood($data)
    {
        try {
            $food = DB::table('foods');
            return [
                'success' => true,
                'data' => $food->paginate($data['per_page'])
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getListFoodOrder($room_service_id)
    {
        try {
            $food = DB::table('room_foods');
            $room_service_food = $food
                ->leftJoin('foods', 'room_foods.food_id', '=', 'foods.id')
                ->where("room_foods.room_service_food_id", $room_service_id)
                ->where("room_foods.status", 1)->get();

            return [
                'success' => true,
                'data' => $room_service_food
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getListOrder($data)
    {
        try {
            $list = DB::table('rooms')
                        ->leftJoin('room_service_food', 'room_service_food.room_id', '=', 'rooms.id')
                        ->where('room_service_food.status', 2)->paginate(5);

            return [
                'success' => true,
                'data' => $list
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function updateListFood($room_service_food_id)
    {
        try {
            $list_food = DB::table("room_foods")->where('room_service_food_id', $room_service_food_id);
            $list_food->update(['status' => 2]);
            $list = DB::table('room_service_food')->where('id', $room_service_food_id);
            $list->update(['status' => 1]);
            return [
                'success' => true
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function listClean()
    {
        try {
            $list_clean = DB::table("room_service_cleans")
                ->leftJoin("rooms", "room_service_cleans.room_id", "=", "rooms.id")
                ->where('room_service_cleans.status', 2)->get();

            return [
                'success' => true,
                'data' => $list_clean
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function updateClean($room_id)
    {
        try {
            $list = DB::table("room_service_cleans")
                ->where("room_id", $room_id)
                ->where("status", 2)
                ->update(['status' => 3]);

            return [
                'success' => true
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function listPark($data)
    {
        try {
            $listPark = DB::table("parks");;
            if (!empty($data['floor'])) {
                $listPark = $listPark->where('floor', $data['floor']);
            }
            if (!empty($data['type'])) {
                $listPark = $listPark->where('type', $data['type']);
            }
            return [
                'success' => true,
                'data' => $listPark->get()
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
    public function updatePark($data)
    {
        try {
            $park_room = new RoomServicePark;
            $park_room->room_id = $data['room_id'];
            $park_room->park_id = $data['park_id'];
            $park_room->start_time = $data['start_time'];
            $park_room->end_time = $data['end_time'];
            $park_room->save();

            $park = DB::table('parks')->where('id', $data['park_id'])->update(['status' => 2]);

            return [
                'success' => true
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
