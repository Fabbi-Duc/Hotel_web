<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Customer\CustomerRepositoryInterface;
use Illuminate\Http\Request;
use App\Mail\SendMailPark;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\RoomServiceClean;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function registerCustomer(Request $request)
    {
        $data = $request->all();
        $result = $this->customerRepository->registerCustomer($data);
        return $result;
    }

    public function getCustomersList(Request $request)
    {
        $data = $request->all();
        $result = $this->customerRepository->getListCustomer($data);
        return $result;
    }

    public function getCountCustomer(Request $request)
    {
        $result = $this->customerRepository->getCountCustomer();
        return $result;
    }

    public function getCustomerFood($id)
    {
        $result = DB::table('rooms_customers')->where('customer_id', $id)->where('status', 2)->first();
        if ($result) {

            return [
                'success' => true,
                'data' => $result->room_id
            ];
        }
        return [
            'success' => false
        ];
    }

    public function bookRoom(Request $request)
    {
        $data = $request->only('name', 'email', 'birthday', 'password', 'gender', 'identity_card', 'phone');
        $id = $request->only('id');
        $time = $request->only('start_time', 'end_time');
        $result = $this->customerRepository->bookRoom($data, $id, $time);
        return $result;
    }

    public function bookRoomOnline(Request $request)
    {
        $data = $request->only('user_id');
        $id = $request->only('id');
        $time = $request->only('start_time', 'end_time');
        $result = $this->customerRepository->bookRoomOnline($data, $id, $time);
        return $result;
    }

    public function getInfoRoomCustomer($id)
    {
        $result = $this->customerRepository->getInfoRoomCustomer($id);
        return $result;
    }

    public function getInfoCustomer($id)
    {
        $result = $this->customerRepository->getInfoCustomer($id);
        return $result;
    }

    public function updateBookRoom($room_customer_id)
    {
        $result = $this->customerRepository->updateBookRoom($room_customer_id);
        return $result;
    }

    public function pay($id)
    {
        $result = $this->customerRepository->pay($id);
        return $result;
    }

    public function food(Request $request)
    {
        $result = $this->customerRepository->food($request->all());
        return $result;
    }

    public function getFood(Request $request)
    {
        $result = $this->customerRepository->getFood($request->all());
        return $result;
    }

    public function getListFoodOrder($room_id)
    {
        $result = $this->customerRepository->getListFoodOrder($room_id);
        return $result;
    }

    public function getListOrder(Request $request)
    {
        $result = $this->customerRepository->getListOrder($request->all());
        return $result;
    }

    public function updateListFood($room_service_food_id)
    {
        $result = $this->customerRepository->updateListFood($room_service_food_id);
        return $result;
    }

    public function listClean()
    {
        $result = $this->customerRepository->listClean();
        return $result;
    }

    public function updateClean($room_id)
    {
        $result = $this->customerRepository->updateClean($room_id);
        return $result;
    }

    public function clean($room_id)
    {
        $result = new RoomServiceClean;
        $result->room_id = $room_id;
        $result->status = 2;
        $result->clean_id = 2;
        $result->start_time = '2021-04-29T10:24';
        $result->end_time = '2021-04-29T10:24';
        $result->cost = '1000';
        $result->save();
        
        return [
            "success" => true
        ];
    }

    public function listPark(Request $request)
    {
        $data = $request->all();
        $result = $this->customerRepository->listPark($data);
        return $result;
    }

    public function updatePark(Request $request)
    {
        $data = $request->all();
        $result = $this->customerRepository->updatePark($data);
        Mail::to($data['email'])->send(new SendMailPark($data['park_id']));
        return $result;
    }
}
