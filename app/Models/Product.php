<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;
class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = [
        'name_ar', 'name_en','description_ar','description_en', 'price','cover_age','category_id'
    ];
    protected $appends = ['name'];

     public function getNameAttribute(){

        if(App::getLocale() == 'ar')
            return $this->name_ar;
        else
            return $this->name_en;

    }
 public function photos()
    {
        return $this->morphMany('App\Models\Photo','photoable');
    }

public function category(){
        return $this->belongsTo('App\Models\Category');
}


}

