<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testHomePageStatus()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testHomePageSinglePosts()
    {
        Post::factory()->create([
            'id' => 21,
            'user_id' => 1,
            'title' => 'Test',
            'slug' => 'test',
            'desc' => 'Test desc',
            'content' => 'Test content',
            'category_id' => 8,
        ]);

        $response = $this->get('/article/test');

        $response->assertOk();
    }
}
