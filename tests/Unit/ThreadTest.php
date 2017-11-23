<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ThreadTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_thread_has_replies()
    {
        $thread = factory('App\Thread')->create();
        $this->assertInstanceOf('Illuminate\Support\Collection',$thread->replies);
    }
    public function test_a_thread_belongs_to_a_channel()
    {
        $thread = create('App\Thread');
        $this->assertInstanceOf('App\Channel',$thread->channel);
    }
    public function test_a_thread_can_create_path()
    {
        $thread = create('App\Thread');
//        dd($thread->channel->slug);
        $this->assertEquals("/threads/{$thread->channel->slug}/{$thread->id}",$thread->path());
    }
//    public function test_a_thread_belongs_to_a_channel()
//    {
//        $thread = create('App\Thread');
//        $this->assertInstanceOf('App\Channel',$thread->channel);
//    }

}
