<?php

namespace Tests\Unit;

use App\Lists;
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
        //dd($data);
        $response = $this->post('/list/create',array(
            'task'=>$data->task,
            'description'=>$data->description,
            'status'=>$data->isComplete
        ));

        $response->assertOK();
        $this->assertCount(1,Lists::all());
    }
}
