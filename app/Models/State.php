<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;
class State extends Model
{
     //use SoftDeletes;

    protected $table = 'states';
    public $timestamps = true;
    protected $appends = ['name'];

    protected $fillable = [
         'name_ar', 'name_en','country_id'
    ];

      public function getNameAttribute(){

        if(App::getLocale() == 'ar')
            return $this->name_ar;
        else
            return $this->name_en;

    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
