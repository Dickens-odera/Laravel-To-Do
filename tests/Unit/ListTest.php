<?php

namespace Tests\Unit;

use App\Lists;
use App\User;
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
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->post('/list/create',array(
            'task'=>$data->task,
            'description'=>$data->description,
            'isComplete'=>$data->isComplete
        ));

        $response->assertStatus(302);
        $response->assertRedirect('/lists');
        $this->assertCount(1,Lists::all());
    }
}
