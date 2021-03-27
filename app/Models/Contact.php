<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App;

class Contact extends Model 
{
  


    public $timestamps = true;
    protected $table = 'contacts';
    protected $fillable = array('name', 'email', 'phone','message','contact_msg_type_id');
  

}
