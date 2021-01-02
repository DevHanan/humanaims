<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App;
class Permission extends Model
{
    use SoftDeletes;

    public $table = 'permissions';
    protected $appends = ['title'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title_ar',
        'title_en',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

      public function getNameAttribute(){

        if(App::getLocale() == 'ar')
            return $this->title_ar;
        else
            return $this->title_en;

    }

    
}
