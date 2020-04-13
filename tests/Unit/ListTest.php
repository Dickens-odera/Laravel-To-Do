<?php

namespace Tests\Unit;

use App\Lists;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;
class ListTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    /**
     * @test
     */
    public function test_that_a_list_can_be_created()
    {
        $this->withoutExceptionHandling();
        $data = factory(Lists::class)->make();
        $response = $this->post(route('lists.submit'),array(
            'task'=>$data->task,
            'description'=>$data->description,
            'isComplete'=>$data->isComplete
        ));

        //$response->assertStatus(200);
        $this->assertCount(1,Lists::all());
        $response->assertRedirect(route('lists.all'));
    }
    /**
     * @test
     */
    public function test_that_a_user_can_create_lists()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->make();
        $list = factory(Lists::class)->make();
        $response = $this->actingAs($user)
                        ->withSession(['role'=>['superadmin','user1','user2']])
                         ->post(route('lists.submit'), array(
                            'task'=>$list->task,
                            'description'=>$list->description,
                            'isComplete'=>$list->isComplete
                         ));
        $response->assertSuccessful();
        $this->assertCount(1, Lists::class);
        $response->assertRedirect(route('lists.all'));
    }
    /**
     * @test
     */
    public function test_that_a_user_can_view_lists()
    {
        $this->withoutExceptionHandling();
        $user = factory(User::class)->make();
        $lists = factory(Lists::class)->make();
        $response = $this->actingAs($user)
                         ->get(route('lists.all'))
                         ->assertSee($lists->task);
        $response->assertOK();
    }
}
