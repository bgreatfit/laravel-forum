<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CreateThreadsTest extends TestCase
{
//    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    /** @test */
    public function an_authenticated_user_can_create_thread()
    {
        // given we have an authenticated user
        $this->actingAs($user = factory('App\User')->create());
        //when we hit the end point to create a new thread
        $thread = factory('App\Thread')->create();
        //Then when we visit the edpoin
        $this->post('/thread',$thread->toArray());
        //when we should see the niew thread;
        $this->get($thread->path());
        $this->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
