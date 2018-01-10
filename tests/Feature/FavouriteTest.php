<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class FavouriteTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function guest_cannot_favourite_a_reply()
    {

        //given we have a reply
        //when we visit the reply/favourite endpoint
        //then assert collection

        $this->withExceptionHandling()
        ->post('reply/1/favourite');
        $this->assertRedirect('/login');

    }
    public function an_authenticated_user_can_favourite_a_reply()
    {
        $this->signIn()->withExceptionHandling();
        //given we have a reply
        //when we visit the reply/favourite endpoint
        //then assert collection
        $reply=  create('App\Reply');
        $this->post('reply/'.$reply->id.'/favourite');
        $this->assertCount(1,$reply->favourites);

    }
    public function an_authenticated_user_cannot_favourite_a_reply_once()
    {
        $this->signIn()->withExceptionHandling();
        //given we have a reply
        //when we visit the reply/favourite endpoint
        //then assert collection
        $reply=  create('App\Reply');
        try{
            $this->post('reply/'.$reply->id.'/favourite');
            $this->post('reply/'.$reply->id.'/favourite');
        }catch(\Exception $e)
        {
            $this->fail('You cannot favourite a reply more than once');
        }


    }


}

/**
 * Created by PhpStorm.
 * User: TECH_2017-06-18_1
 * Date: 1/10/2018
 * Time: 10:11 AM
 */