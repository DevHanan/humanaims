<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Traits\LocalizedTrait;
use App;

class Region extends Model 
{
    use SoftDeletes;
    use LogsActivity;
    use LocalizedTrait;


    public $timestamps = true;
    protected $table = 'regions';
    protected $appends = ['name'];
    protected $dates = ['deleted_at'];
    protected $fillable = array('name_ar', 'name_en', 'parent_id');
   
    protected static $logAttributes = ['name_ar', 'name_en','parent_id'];
    protected static $logName = 'RegionLog';
  
  public function getnameAttribute()
    {
        return $this->getLocaleValue($this, 'name');
    }

     function parent(){
        return $this->belongsTo(Region::class, 'parent_id')->where('parent_id',0);
    }

     function children(){
        return $this->hasMany(self::class,'parent_id','id');
    }

   public function customers(){
        return $this->hasMany(Customer::class);
    }

}
