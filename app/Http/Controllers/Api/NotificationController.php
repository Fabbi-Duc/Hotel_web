<?php

namespace App\Http\Controllers\Api;

use App\Events\SendNotification;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\UserDeviceToken;
use App\Models\UserNotification;
use PHPUnit\Framework\Error\Notice;

class NotificationController extends ApiController
{
    public function saveDeviceToken(Request $request)
    {
        $data = $request->all();
        $token = DB::table('user_device_tokens')->where('user_id', $data['user_id'])->first();
        if($token) {
            DB::table('user_device_tokens')->where('user_id', $data['user_id'])->update(['device_token' => $data['device_token']]);
        } else {
            $user = new UserDeviceToken;
            $user->user_id = $data['user_id'];
            $user->device_token = $data['device_token'];
            $user->device_type = $data['position'];
            $user->save();
        }
    }

    public function sendNotificationFirebase(Request $request)
    {
        $notification = new UserNotification;
        $notification->status = 1;
        $notification->user_id = $request->user_id;
        $notification->body = $request->body;
        $notification->save();
        $numberNotification = DB::table('user_notifications')->where('user_id', $request->user_id)->where('status', 1)->count();
        $registration = DB::table('user_device_tokens')->where('device_type', $request->device_type)->select('device_token')->get();
        $registration_ids = [];
        foreach($registration as $registration_id) {
            array_push($registration_ids, $registration_id->device_token);
        };
        $data = [
            "registration_ids" => $registration_ids,
            "notification" => [
                "sound" => "default",
                "body" => $request->body,
                "title" => $request->title,
                "content_available" => true,
                "priority" => "high"
            ],
            "data" => [
                "sound" => "default",
                "count" => $numberNotification,
                "id" => $request->user_id,
                "body" => $request->body,
                "title" => $request->title,
                "content_available" => true,
                "priority" => "high"
            ]
        ];

        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . config('app.firebase_server_key'),
            'Content-Type: application/json',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        curl_exec($ch);
    }

    public function sendNotification(Request $request)
    {
        broadcast(new SendNotification($request->message, Auth::user()->id))->toOthers();
    }

    public function getNotification($id)
    {
        $notification = DB::table('user_notifications')->where('user_id', $id)->orderBy('id', 'desc')->get();
        $numberNotification = DB::table('user_notifications')->where('user_id', $id)->where('status', 1)->count();

        return [
            'success' => true,
            'data' => $notification,
            'number' => $numberNotification
        ];
    }

    public function updateNotification($id)
    {
        DB::table('user_notifications')->where('user_id', $id)->where('status', 1)->update(['status' => 2]);

        return [
            'success' => true,
        ];
    }
}
