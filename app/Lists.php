<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    protected $table = 'lists';

    protected $fillable = ['task','description','isComplete','user_id'];
}
