<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    public function a_guest_user_may_not_create_thread()
    {
        $this->withExceptionHandling();
        $thread = factory('App\Thread')->make();
        //Then when we visit the endpoint
        $this->post('/threads',$thread->toArray());
    }
    /** @test */
    public function an_authenticated_user_can_create_thread()
    {
        // given we have an authenticated user
        $this->signIn();
        //when we hit the end point to create a new thread
        $thread = make('App\Thread');
//        dd($thread);

        //Then when we visit the endpoint
        $response =$this->post('/threads',$thread->toArray());
        //when we should see the view thread;
        $this->get($response->headers->get('Location'))
             ->assertSee($thread->body);
    }
    /** @test */
    function a_thread_requires_a_title()
    {
       $this->publish_thread(['title'=>null])
           ->assertSessionHasErrors('title');
    }
    /** @test */
    function a_thread_requires_a_body()
    {
       $this->publish_thread(['body'=>null])
           ->assertSessionHasErrors('body');
    }
    /** @test */
    function a_thread_requires_a_channelId()
    {
       $this->publish_thread(['channel_id'=>null])
           ->assertSessionHasErrors('channel_id');
       $this->publish_thread(['channel_id'=>999])
           ->assertSessionHasErrors('channel_id');

    }
    function publish_thread($field=[])
    {
        $this->withExceptionHandling()->signIn();
        //when we hit the end point to create a new thread
        $thread = make('App\Thread',$field);
//        dd($thread);

        //Then when we visit the endpoint
        return $this->post('/threads',$thread->toArray());

    }

}
