<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Customer\CustomerRepositoryInterface;
use Illuminate\Http\Request;
use App\Mail\SendMailPark;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use App\Models\RoomServiceClean;
use App\Models\Room;
use App\Models\Pay;

class CustomerController extends ApiController
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
        $id = $request->only('id', 'money');
        $time = $request->only('start_time', 'end_time');
        $result = $this->customerRepository->bookRoom($data, $id, $time);
        return $result;
    }

    public function bookRoomOnline(Request $request)
    {
        $data = $request->only('user_id');
        if ($request->code == "00") {
            $id = DB::table('pay')->where('user_id', $data['user_id'])->first();
            DB::table('pay')->where('user_id', $data['user_id'])->delete();
            $result = $this->customerRepository->bookRoomOnline($data, $id);
            return $result;
        }

        DB::table('pay')->where('user_id', $data['user_id'])->delete();
        return [
            'success' => false,
        ];
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

    public function createPay(Request $request)
    {
        $data = $request->all();
        $start_time = $data['start_time'];
        $end_time = $data['end_time'];
        $dataRoom = DB::table('rooms_customers')->where('room_id', $data['room_id'])->get();
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
        $pay = new Pay();
        $pay->user_id = $data['user_id'];
        $pay->room_id = $data['room_id'];
        $pay->start_time = $data['start_time'];
        $pay->end_time = $data['end_time'];
        $pay->money = $data['money'];
        $pay->save();

        return [
            'success' => true,
        ];
    }

    public function pay(Request $request)
    {
        $id = $request->only('id');
        $data = $request->only('options', 'cost_houseware', 'user_id');
        $result = $this->customerRepository->pay($id, $data);
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

    public function detailBill($id)
    {
        $result = $this->customerRepository->detailBill($id);
        return $result;
    }

    public function getCountRoomByMonth()
    {
        $rooms = Room::join('rooms_customers', 'rooms.id', '=', 'rooms_customers.room_id')
            ->whereYEAR('start_time', now()->format('Y'))
            ->select(
                DB::raw('count(room_id) as qty'),
                'room_type_id',
                DB::raw('MONTH(start_time) as month')
            )
            ->groupBy('room_type_id', 'month')
            ->get();

        $room_type_id_1 = [];
        $room_type_id_2 = [];
        $room_type_id_3 = [];
        $room_type_id_4 = [];
        foreach ($rooms as $room) {
            if ($room->room_type_id == 1) {
                $room_type_id_1[] = $room;
            } elseif ($room->room_type_id == 2) {
                $room_type_id_2[] = $room;
            } elseif ($room->room_type_id == 3) {
                $room_type_id_3[] = $room;
            } else {
                $room_type_id_4[] = $room;
            }
        }

        return $this->sendSuccess([
            'type_1' => $room_type_id_1,
            'type_2' => $room_type_id_2,
            'type_3' => $room_type_id_3,
            'type_4' => $room_type_id_4
        ]);
    }
    
    public function payOnline(Request $request)
    {
        $data = $request->all();
        session($data);

        $url = $this->paymentOnline($data['money']);

        return $this->sendSuccess($url);
    }

    public function paymentOnline($total)
    {
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        // $vnp_Returnurl = env('URL_FRONTEND');
        $vnp_Returnurl = 'http://localhost:8087/customer';
        $vnp_TmnCode = "44EGMVWE"; //Mã website tại VNPAY
        $vnp_HashSecret = "EJXFWXQOHENORBEKJJDXQVQOEFSXMOTJ"; //Chuỗi bí mật

        $vnp_TxnRef = date("YmdHis"); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = "Thanh toán hóa đơn phí dich vụ";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $total * 100;
        $vnp_Locale = 'vn';
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return $vnp_Url;
    }

    public function getTimeSheet(Request $request)
    {
        $data = $request->all();
        $date = date("Y-m-d 18:00:00", strtotime($data['day']));
        $date1 = date("Y-m-d 06:00:00", strtotime('+1 day', strtotime($data['day'])));
        dd($date1);
    }
}
