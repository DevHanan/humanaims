<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Shetabit\Visitor\Traits\Visitable;


class Message extends Model
{
    protected $table='messages';
protected $appends = ['readableDate'];
    public function from(){
    	return $this->belongsTo(Member::class,'from_id','id');
    }

   public function getreadableDateAttribute(){
       
            return $this->created_at->diffForHumans();

    }
}

