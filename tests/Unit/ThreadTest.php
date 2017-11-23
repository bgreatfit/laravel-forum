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
//    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_a_thread_has_replies()
    {
        $thread = factory('App\Thread')->create();
        $this->assertInstanceOf($Collection, Collection::class);
        $Collection = new Collection(Address::class);
        $this->assertInstanceOf(\Reply::class,$thread->replies);
    }
    public function test_a_thread_belongs_to_a_channel()
    {
        $thread = create('App\Thread');
        $this->assertInstanceOf('App\Channel',$thread->channel);
    }
//    public function test_a_thread_belongs_to_a_channel()
//    {
//        $thread = create('App\Thread');
//        $this->assertInstanceOf('App\Channel',$thread->channel);
//    }

}
