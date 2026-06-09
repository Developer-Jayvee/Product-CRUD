<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    private CONST TOKEN  = "user-token";

    public function register(array $data) : JsonResponse
    {
        try {
            User::create($data);
            return response()->json([
                'message' => 'Successfully registered',
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function login(string $email , string $password,Request $request)
    {
        try {
            $user = User::whereEmailAddress($email)->first();
            if(!Hash::check($password,$user->password)){
                return response()->json([
                    'message' => 'Invalid credentails.'
                ],400);
            }
            $token = $user->createToken(self::TOKEN)->plainTextToken;

            return response()->json([
                'message' => 'User login successfully',
                'data' => [
                    'user' => $user->makeHidden(["password","id"])
                ]
            ])->cookie(
                self::TOKEN,
                $token,
                60,
                '/',
                null,
                true,
                true
            );
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
