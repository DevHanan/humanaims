<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RegionUser extends Model
{

    protected $table = 'region_user';
    public $timestamps = true;

    protected $fillable = [
        'region_id',//
        'user_id',//
       

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }
}
