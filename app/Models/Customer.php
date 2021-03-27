<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $table = 'customers';
    protected $appends = ['name'];
    public $timestamps = true;

    protected $fillable = [
        'fname',//
 'lname',//
        'email',//
        'phone',//
       
        'region_id',//
		'api_token'
    
    ];

    public function region(){
        return $this->belongsTo(Region::class);
    }

public function getNameAttribute(){

       
            return $this->fname .' ' . $this->lname ;
      
    }
}
