<?php

namespace App\Http\Controllers\Api\v1;

use App\Events\MainRoomBroadcast;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageStoreRequest;
use App\Models\Message;

class MessageController extends Controller
{
    public function __construct()
    {
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Message::with('user')->orderByDesc('created_at')->get());
    }

    public function broadcast(MessageStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        $message = $request->validated()['message'];
        $newMessage = Message::create([
            'user_id' => auth()->id(),
            'message' => $message
        ])->with('user')->first();

        broadcast(new MainRoomBroadcast($newMessage));

        return response()->json($newMessage);
    }
}
