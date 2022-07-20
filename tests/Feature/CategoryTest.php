<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCheckCategoryIndex()
    {
        Category::factory()->create([
            'id' => 11,
            'title' => 'Test',
            'slug' => 'test'
        ]);

        $response = $this->get('category/test');

        $response->assertOk();
    }
}
