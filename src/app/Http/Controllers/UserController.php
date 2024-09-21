<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController
{
    public function register(RegisterRequest $request)
    {
        $user = User::query()->create($request->validated());
        return response()->json([
            'token' => $user->createToken('auth_token')->plainTextToken
        ]);
    }

    public function login(LoginRequest $request)
    {
        $user = User::query()
            ->whereEmail($request->email)
            ->first();

        if (!Hash::check($request->password, $user->password)) {
            abort(403);
        }

        return response()->json([
            'token' => $user->createToken('auth_token')->plainTextToken
        ]);
    }
}
