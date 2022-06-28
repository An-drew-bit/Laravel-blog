<?php

namespace Tests\Feature;

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
        $response = $this->get(route('categories.single', ['slug' => 'ducimus-officia-quis-facilis']));

        $response->assertStatus(200);
    }
}
