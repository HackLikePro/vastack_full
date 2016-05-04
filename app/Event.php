<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
   protected $fillable = [
        'event_time','event_title','event_decripetion','user_id','status'
    ];
}
