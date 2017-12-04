<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReadThreadTest extends TestCase
{
    use DatabaseMigrations;
    private $thread;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function setup(){
        parent::setUp();
        $this->thread = create('App\Thread');
    }
    public function test_a_user_can_browse_thread()
    {
        $response = $this->get('/threads');

        $response->assertStatus(200);
    }
//    public function test_a_user_can_view_create_thread()
//    {
//        $this->withExceptionHandling();
//        $this->get('/threads/create')
//        ->assertRedirect()('login');
//    }
    /** @test */
    function a_user_can_read_a_single_thread()
    {
        $this->get($this->thread->path())
            ->assertSee($this->thread->title);
    }
    function test_a_thread_can_be_filtered_by_channel()
    {
        $channel = create('App\Channel');
        $threadInChannel = create('App\Thread',['channel_id'=> $channel->id]);
        $threadNotInChannel = create('App\Thread');
        $this->get("threads/{$channel->slug}")
            ->assertSee($threadInChannel->title)
            ->assertDontsee($threadNotInChannel->title);
    }
    public function test_an_authenticated_user_can_filter_thread_by_name()
    {
        $this->signIn(create('App\User',['name'=>'JohnJoe']));
        $threadByJohnJoe = create('App\Thread',['user_id'=>auth()->id()]);
        $threadNotByJohnJoe = create('App\Thread');
        $this->get('threads?by=JohnJoe')
            ->assertSee($threadByJohnJoe->title)
            ->assertDontSee($threadNotByJohnJoe->title);

    }
//    public function test_a_user_can_read_replies_that_associated_with_a_thread()
//    {
//        $reply = factory('App\Reply')->create(['thread_id'=>$this->thread->id]);
////        dd($this->thread->path());
//         $this->get("/threads/{$this->thread->path()}")
//         ->assertSee($reply->body);
//    }
}
