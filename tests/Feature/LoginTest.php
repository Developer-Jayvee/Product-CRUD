<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_user_can_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt("Password123")
        ]);

        $response = $this->postJson("api/v1/login",[
            "email" => $user->email_address,
            "password" => "Password123"
        ]);

        $response
                ->assertStatus(200)
                ->assertCookie("user-token")
                ->assertJson([
                    'message' => "User login successfully"
                ]);
    }
}
