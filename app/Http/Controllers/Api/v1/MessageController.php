<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageStoreRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        return response()->json(Message::all());
    }

    public function store(MessageStoreRequest $request)
    {
        $message = $request->validated()['message'];
        $newMessage = Message::query()->create([
            'user_id' => auth()->id(),
            'message' => $message
        ]);

        return response()->json($newMessage);
    }
}
