<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use App\Services\SocialMediaPostService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostServicesTest extends TestCase
{

    public function test_get_all_posts()
    {
        $response = $this->get('/post/2');

        $response->assertStatus(200);
    }

    public function test_create_post()
    {

        $post = Post::factory()->create()->attributesToArray();
        $response = $this->post('/post/2',$post);
        $response->assertStatus(200);
    }

    public function test_update_post()
    {
        $post = Post::factory()->create(['title'=>'Updated Alpha Title__'])->attributesToArray();
        $response = $this->patch('/post/10',$post);
        $response->assertStatus(200);
    }

    public function test_update_non_existing_post()
    {
        $post = Post::factory()->create(['title'=>'Updated Title'])->attributesToArray();
        $response = $this->patch('/post/1000',$post);
        $response->assertStatus(500);
    }

    public function test_delete_post()
    {
        $response = $this->delete('/post/8');
        $response->assertStatus(200);
    }

    public function test_delete_non_existing__post()
    {
        $response = $this->delete('/post/1000');
        $response->assertStatus(500);
    }
}
