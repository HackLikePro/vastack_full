<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
  protected $fillable = [
        'user_id','sender_id','sender_url','message_title','message','status'
    ];
}
