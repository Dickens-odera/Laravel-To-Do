<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
class ListsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array(
            'id'=>$this->id,
            'task'=>$this->task,
            'description'=>$this->description,
            'isComplete'=>$this->isComplete
        );
    }
    public function with($request)
    {
        return [
            'author'=>'Dickens Odera',
            'url'=>'https://github.com/Dickens-odera/Laravel-To-Do',
            'social'=> [
                'twitter'=>'https://twitter.com/dickensodera',
                'facebook'=>'https://facebook.com/dickens.odera'
            ],
            'contact'=>[
                'email'=>'dickensodera9@gmail.com',
                'phone'=>'+254714905613'
            ],
        ];
    }
}
