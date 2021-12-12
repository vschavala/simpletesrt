<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{


    /**
     * Make ajax POST request
     */
    protected function ajaxPost($uri, array $data = [])
    {
        return $this->post($uri, $data, array('HTTP_X-Requested-With' => 'XMLHttpRequest'));
    }

    /**
     * Make ajax GET request
     */
    protected function ajaxGet($uri, array $data = [])
    {
        return $this->get($uri, array('HTTP_X-Requested-With' => 'XMLHttpRequest'));
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserAll()
    {
        $url = 'users';
        $response = $this->ajaxGet($url)
        ->assertSuccessful()
        ->assertJson([
            'error' => FALSE,
            'message' => 'Some data'
        ]); 

        $response->assertStatus(200);
    }
}
