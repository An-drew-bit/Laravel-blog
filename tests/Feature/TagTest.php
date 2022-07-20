<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class TagTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCheckTagPage()
    {
        Tag::factory()->create([
            'id' => 11,
            'title' => 'Test',
            'slug' => 'test'
        ]);

        $response = $this->get('/tag/test');

        $response->assertOk();
    }

    public function testAddPostTagInPost()
    {
        DB::table('post_tag')->insert([
            'id' => 41,
            'tag_id' => 11,
            'post_id' => 21
        ]);

        $response = $this->get('/tag/test');

        $response->assertOk();
    }
}
