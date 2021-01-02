<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = 'visits';

     protected $appends = ['readableDate'];



  public function getreadableDateAttribute(){
       
            return $this->created_at->diffForHumans();

    }  

}
