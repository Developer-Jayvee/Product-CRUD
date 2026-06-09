<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\JsonResponse;

class AuthService
{

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
}
