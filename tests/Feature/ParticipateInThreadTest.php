<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class ParticipateInThreadTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
//    public function an_authenticated_user_may_participate_in_forum_thread()
//    {
//        $this->signIn();
//        $thread = create('App\Thread');
//        $reply = make('App\Reply');
//        $this->post("{$thread->path()}/replies",$reply->toArray());
//        $this->get($thread->path())
//            ->assertSee($reply->body);
//
//    }
    /** @test */
    function a_reply_requires_a_body()
    {
        $this->publish_thread(['body'=>null]);

    }
    function publish_thread($field=[])
    {
        $this->withExceptionHandling()->signIn();

        $thread = create('App\Thread');

        //Then when we visit the endpoint
         $this->post("{$thread->path()}/replies",$field)
             ->assertSessionHasErrors('body');



    }
}
