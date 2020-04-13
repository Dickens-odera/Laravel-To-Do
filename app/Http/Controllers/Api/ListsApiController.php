<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ListsResource;
use App\Lists;
use Illuminate\Database\Eloquent\Collection;

class ListsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = Lists::all();
        return ListsResource::collection($lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Lists $lists)
    {
        //$request->expectsJson($request->all());
        $lists = $request->isMethod('PUT') ? $lists->findOrFail($request->id) : new Lists();
        $lists->task = $request->task;
        $lists->description = $request->description;
        $lists->isComplete = $request->isComplete;
        if($lists->save()) 
        {
            return new ListsResource($lists);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Lists $list)
    {
        $list = $list->findOrFail($id);
        return new ListsResource($list);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Lists $list)
    {
       $list =  $list->findOrFail($id);
        if($list->delete()){
            return new ListsResource($list);
        }
    }
}
