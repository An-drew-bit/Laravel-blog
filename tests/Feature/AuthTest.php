<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCheckRegisterForm()
    {
        $response = $this->get(route('register.create'));

        $response->assertStatus(200);
    }

    public function testCheckAuthForm()
    {
        $response = $this->get(route('login.create'));

        $response->assertStatus(200);
    }

    public function testUserStore()
    {
        $responce = $this->post('/register', [
            'name' => 'test',
            'email' => 'test@mail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('test'),
            'remember_token' => Str::random(10),
            'is_admin' => 0,
        ]);

        $this->assertDatabaseCount('users', 2);

        $this->assertDatabaseHas('users', [
            'name' => 'test'
        ]);

        $responce->assertCreated();
    }
}
