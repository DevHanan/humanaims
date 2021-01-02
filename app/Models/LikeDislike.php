<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Shetabit\Visitor\Traits\Visitable;
class LikeDislike extends Model
{

	 protected $fillable = array('like','dislike','member_id','subject_id');

	  public function subject()
    {
        return $this->belongsTo('App\Models\Subject');
    }

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }
    //
}
