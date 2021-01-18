<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Traits\LocalizedTrait;
use App;

class Specialization extends Model 
{
    use SoftDeletes;
    use LogsActivity;
    use LocalizedTrait;


    public $timestamps = true;
    protected $table = 'specializations';
    protected $appends = ['name'];
    protected $dates = ['deleted_at'];
    protected $fillable = array('name_ar', 'name_en', 'parent_id');
   
    protected static $logAttributes = ['name_ar', 'name_en','parent_id'];
    protected static $logName = 'SpecializaionLog';
  
  public function getnameAttribute()
    {
        return $this->getLocaleValue($this, 'name');
    }

     function parent(){
        return $this->belongsTo(Specialization::class, 'parent_id')->where('parent_id',0);
    }

     function children(){
        return $this->hasMany(self::class,'parent_id','id');
    }


}