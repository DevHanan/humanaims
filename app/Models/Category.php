<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;
class Category extends Model
{
    //use SoftDeletes;

    protected $table = 'categories';
    public $timestamps = true;
     protected $appends = ['name'];

    protected $fillable = [
         'name_ar', 'name_en'
    ];


    public function getNameAttribute(){

        if(App::getLocale() == 'ar')
            return $this->name_ar;
        else
            return $this->name_en;

    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

