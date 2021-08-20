<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostServicesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_all_posts()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_create_post()
    {
        $response = $this->post('/');

        $response->assertStatus(200);
    }

    public function test_update_post()
    {
        $response = $this->patch('/');

        $response->assertStatus(200);
    }

    public function test_delete_post()
    {
        $response = $this->delete('/');

        $response->assertStatus(200);
    }

}
