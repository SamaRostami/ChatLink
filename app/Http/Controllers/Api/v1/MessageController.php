<?php

namespace App\Http\Controllers\Api\v1;

use App\Events\MainRoomBroadcast;
use App\Http\Controllers\Controller;
use App\Http\Requests\MessageStoreRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        return response()->json(Message::all());
    }

    public function broadcast(MessageStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        $message = $request->validated()['message'];
        $newMessage = Message::query()->create([
            'user_id' => auth()->id(),
            'message' => $message
        ]);

        broadcast(new MainRoomBroadcast($message, auth()->user()))->toOthers();

        return response()->json($newMessage);
    }
}
