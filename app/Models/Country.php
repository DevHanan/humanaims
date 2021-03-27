<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;
class Country extends Model
{
    //use SoftDeletes;

    protected $table = 'countries';
    public $timestamps = true;
     protected $appends = ['name'];

    protected $fillable = [
        'code_ar', 'name_ar', 'code_en', 'name_en','phone_code'
    ];


    public function getNameAttribute(){

        if(App::getLocale() == 'ar')
            return $this->name_ar;
        else
            return $this->name_en;

    }

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
