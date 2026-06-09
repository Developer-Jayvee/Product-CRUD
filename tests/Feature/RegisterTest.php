<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
   public function test_user_register()
   {
        $response = $this->postJson("api/v1/register",[
            'first_name' => 'test',
            'last_name' => 'test',
            'email_address' => 'test@gmail.com',
            'mobile_number' =>'09954903854',
            'address' => 'asd',
            'email_verified_at' => now(),
            'password' => 'P@ssword123',
        ]);

        $response->assertStatus(200)
                ->assertJson([
                    'message'=>'Successfully registered'
                ]);
   }
}
