<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCheckPostIndex()
    {
        $response = $this->get(route('posts.single', ['slug' => 'minus-velit-sint-odit']));

        $response->assertStatus(200);
    }
}
