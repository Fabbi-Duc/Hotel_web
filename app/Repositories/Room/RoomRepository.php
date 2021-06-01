<?php

namespace App\Repositories\Room;

use App\Models\Room;
use App\Repositories\RepositoryAbstract;
use Illuminate\Support\Facades\DB;

class RoomRepository extends RepositoryAbstract implements RoomRepositoryInterface
{
    public function model()
    {
        return Room::class;
    }

    public function getCodeRoom($data)
    {
        try {
            $list = $this->model;
            $name = $data['name'];
            $code = $list->where('name', $name)->get();
            return [
                'success' => true,
                'code' => $code[0]['code_room']
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getListRooms($data)
    {
        try {
            $list = $this->model;
            $perPage = $data['perPage'];
            $name = $data['name'];
            $roomType = $data['roomType'];
            if ($data['name']) {
                $list->where('name', 'LIKE', "%$name%");
            }
            if ($data['roomType']) {
                $list->where('room_type_id', 'LIKE', "%$roomType%");
            }

            return [
                'success' => true,
                'listRoom' => $list->paginate($perPage)
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getTypeRoom()
    {
        try {
            $list = DB::table('room_types');
            return [
                'success' => true,
                'listRoomTypes' => $list->get()
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function deleteRoom($data)
    {
        try {
            $id = $data['id'];
            $room = $this->model->find($id);
            $room->delete();

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

    public function getInfoRoom($id) 
    {
        try {
            $room = $this->model->find($id);

            return [
                'success' => true,
                'room' => $room
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function createRoom($data)
    {
        try {
            $room = $this->model->create($data);
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

    public function getNameRoom() {
        try {
            $name = $this->model->select('name');
            return [
                'success' => true,
                'data' => $name->get()
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function updateRoom($data, $id) {
        try {
            $room = $this->model;
            $room->update($data, $id);
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }

    public function getRoomFloor($data) 
    {
        try {
            $list = $this->model;
            $floor = $data['floor'];
            $type = $data['type'];
            $list->where('floor', $floor);
            if($type)
            {
                $list->where('room_type_id', $type);
            }
            return [
                'success' => true,
                'data' => $list->get()
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'message' => $e->getMessage()
            ];
        }
    }
}
