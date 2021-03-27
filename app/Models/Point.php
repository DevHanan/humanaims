<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;
class Point extends Model
{
     protected $table = 'points';
    public $timestamps = true;
    protected $fillable = [
        'point', 'min_charge','category_id'
    ];
   
public function category(){
        return $this->belongsTo('App\Models\Category');
}


}
