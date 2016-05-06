<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    //
  protected $fillable = [
        'user_id','project_id','milestone_title','milestone','status'
    ];
}
