<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class UserServicesTest extends TestCase
{

    use WithoutMiddleware;

    public function test_get_all_users()
    {
        $response = $this->get('/user');
        $response->assertStatus(200);
    }

    public function test_create_user(){

        $user = User::factory()->create()->attributesToArray();
        $response = $this->post('/user',$user);
        $response->assertStatus(200);
    }


    public function test_update_user(){

        $user = User::factory()->create(['name'=>'UpdatedName'])->attributesToArray();
        $response = $this->patch('/user/2',$user);
        $response->assertStatus(200);
    }

    public function test_update_not_existing_user(){

        $user = User::factory()->create(['name'=>'Updated Name__'])->attributesToArray();
        $response = $this->patch('/user/1000',$user);
        $response->assertStatus(500);
    }

    public function test_delete_user(){

        $response = $this->delete('/user/3');
        $response->assertStatus(200);
    }

    public function test_delete_not_existing_user(){

        $response = $this->delete('/user/1000');
        $response->assertStatus(500);
    }
}
