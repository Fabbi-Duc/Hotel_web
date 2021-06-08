<?php

namespace App\Repositories\Customer;

use App\Repositories\RepositoryInterface;

interface CustomerRepositoryInterface extends RepositoryInterface
{
    public function registerCustomer($data);
    public function getListCustomer($data);
    public function getCountCustomer();
    public function bookRoom($data, $id, $time);
    public function bookRoomOnline($data, $id);
    public function getInfoRoomCustomer($id);
    public function getInfoCustomer($data);
    public function updateBookRoom($data);
    public function pay($room_id, $data);
    public function food($data);
    public function getFood($data);
    public function getListFoodOrder($room_service_id);
    public function getListOrder($data);
    public function updateListFood($room_service_food_id);
    public function listClean();
    public function updateClean($room_id);
    public function listPark($data);
    public function updatePark($data);
    public function detailBill($id);
    public function getHistory($data);
    public function deleteBill($id);
    public function updateBill($data);
}
