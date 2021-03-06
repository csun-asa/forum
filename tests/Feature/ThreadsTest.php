<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DataBaseMigrations;

class ThreadsTest extends TestCase
{

  use DataBaseMigrations;

    /** @test */
    public function a_user_can_view_all_threads()
    {
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads');

        $response->assertSee($thread->title);

        $response = $this->get('/threads/' . $thread->id);

        $response->assertSee($thread->title);
    }

    /** @test */
    public function a_user_can_view_a_single_thread()
    {
      $thread = factory('App\Thread')->create();

      $response = $this->get('/threads/' . $thread->id);
      $response->assertSee($thread->title);
    }
}
