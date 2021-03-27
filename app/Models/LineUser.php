<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LineUser extends Model
{
     protected $table = 'line_user';
    public $timestamps = true;

    protected $fillable = [
        'line_id',//
        'user_id',//
       

    ];

    public function user()(){
        return $this->belongsTo(User::class);
    }

    public function line(){
        return $this->belongsTo(Line::class);
    }
}
