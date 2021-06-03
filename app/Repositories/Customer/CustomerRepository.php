<?php

namespace App\Repositories\Customer;

use App\Models\Customers;
use App\Models\RoomsCustomer;
use App\Models\Bills;
use App\Models\RoomFoods;
use App\Models\RoomServiceFood;
use App\Models\RoomServicePark;
use App\Models\ExportHouseware;
use App\Models\ServiceExportHouseware;
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

    public function getCountCustomer()
    {
        try {
            $list = DB::table("customers");
            return [
                'success' => true,
                'count' => $list->get()->count()
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
            $room->money = $id['money'];
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

    public function bookRoomOnline($data, $id)
    {
        try {
            $room = new RoomsCustomer;
            $bill = new Bills;
            $room->customer_id = $data['user_id'];
            $room->status = 1;
            $room->room_id = $id->room_id;
            $room->start_time = $id->start_time;
            $room->end_time = $id->end_time;
            $room->money = $id->money;
            $room->save();

            $bill->room_id = $id->room_id;
            $bill->start_time = $id->start_time;
            $bill->end_time = $id->end_time;
            $bill->status = 1;
            $bill->save();

            $room = DB::table('rooms')->where('id', $id->room_id)->first();
            if ($room->status == 1) {
                DB::table('rooms')->where('id', $id->room_id)->update(['status' => 2]);
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
            $room = DB::table('rooms_customers')->leftJoin('customers', 'rooms_customers.customer_id', '=', 'customers.id')
                            ->where('rooms_customers.room_id', $id)->where('rooms_customers.status', 1)->get();
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
            $data->money = $customer->money;
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
            $customer = DB::table('rooms_customers')->where('customer_id', $room_customer_id)->where('status', 1)->first();
            $start_time = $customer->start_time;
            DB::table('rooms')->where('id', $customer->room_id)->update(['status' => 3]);
            DB::table('rooms_customers')->where('customer_id', $room_customer_id)->where('status', 1)->update(['status' => 2]);
            DB::table('bills')->where('room_id', $customer->room_id)->where('status', 1)
                    ->where('start_time', $start_time)->update(['status' => 2]);
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

    public function detailBill($room_id)
    {
        try {
            $room = DB::table('rooms_customers')->where('room_id', $room_id)->where('status', 2)->first();
            $room_type = DB::table('rooms')->where('id', $room_id)->first();
            $cost = DB::table('room_types')->where('id', $room_type->room_type_id)->first();
            $name = DB::table('customers')->where('id', $room->customer_id)->first()->name;
            $first_date = strtotime($room->start_time);
            $second_date = strtotime($room->end_time);
            $datediff = abs($second_date - $first_date);
            if ($datediff <= 1) {
                $data = $cost->cost_first_hour;
            } else {
                $data = $cost->cost_first_hour + (($datediff / 3600) - 1) * $cost->cost_next_hour;
            };
            $food = DB::table('room_service_food')->where('room_id', $room_id)->where('status', 1)->first();
            $money = 0;
            if ($food) {
                $food_list = DB::table('room_foods')->where('room_service_food_id', $food->id)->get();
                foreach ($food_list as $list) {
                    $money += DB::table('foods')->find($list->food_id)->cost * $list->count;
                }
            }

            return [
                'success' => true,
                'data' => $data,
                'money' => $money,
                'hour' => $datediff,
                'name' => $name,
                'start_time' => $room->start_time,
                'deposit' => $room->money,
                'end_time' => $room->end_time
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function pay($room_id, $params)
    {
        try {
            DB::table('rooms_customers')->where('room_id', $room_id)->where('status', 2)->update(['status' => 3]);
            DB::table('rooms')->where('id', $room_id)->update(['status' => 1]);
            DB::table('bills')->where('room_id', $room_id)->where('status', 2)->update(['status' => 3, 'price' => $params['cost_houseware']]);
            DB::table('rooms_customers')->where('room_id', $room_id)->where('status', 2)->update(['status' => 3]);

            if (!empty($params['options'])) {
                $object = $params['options'];
                $total = 0;
                foreach ($object as $houseware) {
                    $houseware_object = json_decode($houseware);
                    $total += $houseware_object->cost * $houseware_object->quantity;
                }
                $couponHouseware = new ExportHouseware;
                $couponHouseware->description = 'Yeu cau xuat kho';
                $couponHouseware->status = 1;
                $couponHouseware->cost = $total;
                $couponHouseware->user_id = $params['user_id'];
                $couponHouseware->save();
                $id = DB::table('export_houseware')->get()->last()->id;
                foreach ($object as $houseware) {
                    $houseware_object = json_decode($houseware);
                    $service_houseware = new ServiceExportHouseware;
                    $service_houseware->export_houseware_id = $id;
                    $service_houseware->houseware_id = $houseware_object->houseware_id;
                    $service_houseware->quantity = $houseware_object->quantity;
                    $service_houseware->save();
                    $quantity_broken = DB::table('houseware')->where('id', $houseware_object->houseware_id)->first->quantity_broken + $houseware_object->quantity;
                    DB::table('houseware')->where('id', $houseware_object->houseware_id)->update(['quantity_broken' => $quantity_broken]);
                }
            }
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
            $service_food->status = 2;
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
