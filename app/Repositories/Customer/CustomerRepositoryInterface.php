<?php

namespace App\Repositories\Customer;

use App\Repositories\RepositoryInterface;

interface CustomerRepositoryInterface extends RepositoryInterface
{
    public function registerCustomer($data);
    public function getListCustomer($data);
    public function bookRoom($data, $id, $time);
    public function bookRoomOnline($data, $id, $time);
    public function getInfoRoomCustomer($id);
    public function getInfoCustomer($room_customer_id);
    public function updateBookRoom($room_customer_id);
    public function pay($room_id);
    public function food($data);
    public function getFood($data);
    public function getListFoodOrder($room_service_id);
    public function getListOrder($data);
    public function updateListFood($room_service_food_id);
    public function listClean();
    public function updateClean($room_id);
    public function listPark($data);
    public function updatePark($data);
}
