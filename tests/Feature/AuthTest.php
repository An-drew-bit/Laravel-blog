<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
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
}
