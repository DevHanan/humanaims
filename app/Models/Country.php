<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

use App;
class Country extends Model
{
    //use SoftDeletes;
        use SoftDeletes,LogsActivity;


    protected $table = 'countries';
    public $timestamps = true;
    protected $appends = ['name'];
    protected $fillable = [
        'name_en', 'name_ar'
    ];

    protected static $logAttributes = ['name_ar', 'name_en'];
    protected static $logName = 'CountriesLog';
    public function getNameAttribute(){

        if(App::getLocale() == 'ar')
            return $this->name_ar;
        else
            return $this->name_en;

    }

    
}
