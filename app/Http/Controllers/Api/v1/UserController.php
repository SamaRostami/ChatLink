<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function show(string $user_id): \Illuminate\Http\JsonResponse
    {
        return response()->json(User::query()->findOrFail($user_id));
    }
}
