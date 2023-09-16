<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
    }

    public function login(AuthLoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user?->createToken('auth-token')->plainTextToken;

            return response()->json([
                'token' => $token,
                'user' => $user
            ]);
        }

        $user = User::where('username', $credentials['username'])->first();

        if (!$user) {
            $newUser = User::create($credentials+[
                'avatar' => $this->avatarCreator($credentials['username'])
                ]);

            Auth::login($newUser);
            $token = $newUser->createToken($credentials['username'])->plainTextToken;

            return response()->json([
                'token' => $token,
                'user' => $newUser
            ]);
        }

        return response()->json(['message' => 'Username is already taken.'], 422);
    }

    private function avatarCreator(string $username): string
    {
        return 'https://ui-avatars.com/api/?background=random&color=fff&name='.urlencode($username).'&bold=true&format=png';
    }
}
