<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReadThreadTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function setup(){
        parent::setUp();
        $this->thread = factory('App\Thread')->create();
    }
    public function test_a_user_can_browse_thread()
    {
        $response = $this->get('/threads');

        $response->assertStatus(200);
    }
    public function test_a_user_can_view_create_thread()
    {
        $response = $this->get('/threads');

        $response->assertRedirect('login');
    }
    public function test_a_user_can_read_replies_that_associated_with_a_thread()
    {
        $reply = factory('App\Reply')->create(['thread_id'=>$this->thread->id]);
         $this->get('/threads/'.$this->thread->id)
         ->assertSee($reply->body);
    }
}
