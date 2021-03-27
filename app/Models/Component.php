<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Traits\LocalizedTrait;

use App;
class Component extends Model
{
    use SoftDeletes,LogsActivity ,LocalizedTrait;

    protected $table = 'components';
    public $timestamps = true;
    protected $appends = ['name'];
    protected $with = ['children'];

    protected $fillable = [
         'name_ar', 'name_en','parent_id'
    ];

    protected static $logAttributes = ['name_ar', 'name_en'];
    protected static $logName = 'ComponentsLog';

      public function getnameAttribute()
    {
        return $this->getLocaleValue($this, 'name');
    }

     function parent(){
        return $this->belongsTo(Component::class, 'parent_id')->where('parent_id',0);
    }

     function children(){
        return $this->hasMany(self::class,'parent_id','id');
    }

}

