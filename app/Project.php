<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'name', 'user_id', 'describe', 'duedate', 'task', 'deliveryable', 'url', 'status'
    ];
    //
}
