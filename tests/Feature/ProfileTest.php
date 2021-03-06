<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class ProfileTest extends TestCase
{
    use DatabaseMigrations;
    /** @test */
    public function a_user_can_view_any_profile()
    {
        $user = create('App\User');
        $this->get('/profile/'.$user->name)
            ->assertSee($user->name);
    }

    /**
     *
     */
    /** @test */
    public function a_user_can_view_any_profile_see_threads()
    {
        $user = create('App\User');
        $thread = create('App\Thread', ['user_id'=>$user->id]);
        $this->get('/profile/'.$user->name)
            //->assertSee($user->name)
            ->assertSee($thread->body);



    }

}
