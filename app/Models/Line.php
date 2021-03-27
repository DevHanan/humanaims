<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

use App;
class Line extends Model
{
    //use SoftDeletes;
        use SoftDeletes,LogsActivity;


    protected $table = 'lines';
    public $timestamps = true;
    protected $appends = ['name'];
    protected $fillable = [
        'name_en', 'name_ar','region_id'
    ];

    protected static $logAttributes = ['name_ar', 'name_en'];
    protected static $logName = 'LinesLog';
    public function getNameAttribute(){

        if(App::getLocale() == 'ar')
            return $this->name_ar;
        else
            return $this->name_en;

    }

 function region(){
        return $this->belongsTo(Region::class);
    }

    
}
