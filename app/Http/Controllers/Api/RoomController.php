<?php

namespace App\Http\Controllers\Api;

use App\Repositories\Room\RoomRepositoryInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    private $roomRepository;

    public function __construct(RoomRepositoryInterface $roomRepository)
    {
        $this->roomRepository = $roomRepository;
    }

    public function getCodeRoom(Request $request)
    {
        $data = $request->all();
        $result = $this->roomRepository->getCodeRoom($data);
        return $result;
    }

    public function getListRooms(Request $request)
    {
        $data = $request->all();
        $result = $this->roomRepository->getListRooms($data);
        return $result;
    }

    public function deleteRoom(Request $request)
    {
        $data = $request->all();
        $result = $this->roomRepository->deleteRoom($data);
        return $result;
    }

    public function getRoomType()
    {
        $result = $this->roomRepository->getTypeRoom();
        return $result;
    }

    public function getInfoRoom($id)
    {
        $result = $this->roomRepository->getInfoRoom($id);
        return $result;   
    }

    public function createRoom(Request $request)
    {
        $data = $request->all();
        $result = $this->roomRepository->createRoom($data);
        return $result;   
    }

    public function getNameRoom()
    {
        $result = $this->roomRepository->getNameRoom();
        return $result;
    }

    public function getRoomFloor(Request $request)
    {
        $data = $request->all();
        $result = $this->roomRepository->getRoomFloor($data);
        return $result;
    }

    public function updateRoom(Request $request)
    {
        $data = $request->only('name','code_room', 'room_type_id', 'status', 'decription', 'image_url', 'floor');
        $id = $request->only('id');
        $result = $this->roomRepository->updateRoom($data, $id);
        return $result;
    }

    public function loadComment() {
        $url_get = "https://graph.facebook.com/v10.0/3065207047033710_3065167190371029/comments?limit=1000&filter=toplevel&access_token=EAAFeIzn3UTcBAKjJp0PH1ZAAHG4rZAwQM2AqTOv4pXvgNZAZBgZAHMQbbzOSR3F4sdfTpDcZABctZCVRC4OEOa20UZBgtBD96ubWdSlB3WiQUGJA4WFpbw5zWVzQOkHXS3ecDtjKtMLgwyEgZAqIH9dor3X4b1yPtnanOwrABhT681uOZA16adMuWWvSRlX4JLP4SqbbHmKpsTgx3Ud9nZCTjcuV4jOcS4f32BeQwMEn6XUZBDflVfJyWorA";
        $c = curl_init($url_get);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $json_string = curl_exec($c);
        $array = json_decode($json_string, true);
        $array_data = $array['data'];
        $array_key = array_keys($array_data);
        $count = count($array_data);
        echo 'Total: ' . $count . ' comments.<br>';
        for ($i=0; $i<$count; $i++) {
            $n = rand(0, $count-1);
            $key = $array_key[$n];
            $crawl = $array_data[$key];
            echo 'ID: ' . $crawl['id'] . '<br>';
            echo 'Message: ' . $crawl['message'] . '<br>';
        }
    }
}
