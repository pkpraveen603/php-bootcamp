<?php

namespace Tests\Feature;

use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentServicesTest extends TestCase
{

    public function test_get_all_comments()
    {
        $response = $this->get('/comment/6');
        $response->assertStatus(200);
    }

    public function test_add_comment()
    {

        $comment = Comment::factory()->create(['user_id'=>2])->attributesToArray();
        $response = $this->post('/comment/6',$comment);
        $response->assertStatus(200);
    }

    public function test_inalid_user_add_comment()
    {

        $comment = Comment::factory()->create(['user_id'=>2000])->attributesToArray();
        $response = $this->post('/comment/6',$comment);
        $response->assertStatus(500);
    }

    public function test_inalid_post_add_comment()
    {

        $comment = Comment::factory()->create(['user_id'=>2])->attributesToArray();
        $response = $this->post('/comment/1000',$comment);
        $response->assertStatus(500);
    }

    public function test_delete_comment()
    {
        $response = $this->delete('/comment/2');
        $response->assertStatus(200);
    }

    public function test_delete_non_existing_comment()
    {
        $response = $this->delete('/comment/1000');
        $response->assertStatus(500);
    }
}
