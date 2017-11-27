<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class ChannelTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function it_()
    {
        
    }
    /** @test */
    public function a_channel_has_an_associated_thread()
    {
        $channel = create('App\Channel');
        $thread = create('App\Thread',['channel_id'=> $channel->id]);
        self::assertTrue($channel->threads->contains($thread));
    }

}
