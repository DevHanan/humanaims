<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Vendor extends Model
{
	use SoftDeletes;

    protected $table = 'vendors';
    public $timestamps = true;
      protected $fillable = [
        'name', 'email', 'lname', 'fname','currency_id','country_id','state_id','address1','address2','postal_code','account_number','mobile','phone','fax','toll_free',
            'website'
    ];

     public function currency(){
        return $this->belongsTo(Currency::class);
    }

     public function country(){
        return $this->belongsTo(Currency::class);
    }

    public function state(){
        return $this->belongsTo(State::class);
    }
}

