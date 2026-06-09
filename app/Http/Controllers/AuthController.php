<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreRegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private readonly AuthService $_authService;

    public function __construct(AuthService $authService) {
        $this->_authService = $authService;
    }
    public function login(LoginRequest $request)
    {

    }

    public function register(StoreRegisterRequest $request)
    {
        try {
            return $this->_authService->register($request->all());
        } catch (\Throwable $th) {
            return response()->json($th,400);
        }
    }
}
