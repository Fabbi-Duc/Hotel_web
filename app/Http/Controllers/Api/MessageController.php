<?php

namespace App\Http\Controllers\Api;

use App\Events\MessagePosted;
use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store (Request $request) {
        $message = new Message();
        $message->room = $request->input('room', '');
        $message->sender = Auth::user()->id;
        $message->content = $request->input('content', '');

        $message->save();

        broadcast(new MessagePosted($message->load('sender')))->toOthers();

        return response()->json(['message' => $message->load('sender')]);
    }
}
