<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App;
class Role extends Model
{

    public $table = 'roles';
    protected $appends = ['name'];
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name_en',
        'name_ar',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

        protected $with = ['permissions'];


    public function getNameAttribute(){

        if(App::getLocale() == 'ar')
            return $this->name_ar;
        else
            return $this->name_en;

    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }


}
