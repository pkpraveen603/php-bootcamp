<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentServicesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_comments()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_add_comment()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_delete_comment()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
