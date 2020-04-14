<?php

namespace Tests\Feature;

use App\Lists;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListsApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    /**
     * @test
     */
    public function test_api_list_creation()
    {
        $this->withoutExceptionHandling();
        $lists = factory(Lists::class)->make();
        $response = $this->post(route('api.lists.submit'), array(
            'task'=>$lists->task,
            'description'=>$lists->description,
            'isComplete'=>$lists->isComplete
        ));
        $response->assertStatus(200);
        //$response->assertJson((array)$lists);
    }
    /**
     * @test
     */
    public function test_api_list_single_view()
    {
        $this->withoutExceptionHandling();
        $data = factory(Lists::class)->make();
        $response = $this->get('/api/v1/lists/{id}',[
            'id'=>$data->id,
        ]);

        $response->assertStatus(200);
        //$this->assertTrue('','');
    }
    /**
     * @test
     */
    public function test_api_lists_deletion()
    {
        $this->withoutExceptionHandling();
        $data = factory(Lists::class)->make();
        $list = $data->fresh()->id;
        $list = Lists::where('id','=',$data->id)->first();
        $response = $this->delete('/api/v1/lists/{id}',['id'=>$data->id]);
        $response->assertStatus(200);
        $this->assertCount(0, Lists::where('id','=',$data->id));
    }
}
