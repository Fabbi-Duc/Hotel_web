<?php

namespace App\Repositories\Room;

use App\Repositories\RepositoryInterface;

interface RoomRepositoryInterface extends RepositoryInterface
{
    public function getCodeRoom($data);
    public function getListRooms($data);
    public function getCountRooms();
    public function deleteRoom($data);
    public function getTypeRoom();
    public function getInfoRoom($id);
    public function createRoom($data);
    public function getNameRoom();
    public function updateRoom($data, $id);
    public function getRoomFloor($data);
}
