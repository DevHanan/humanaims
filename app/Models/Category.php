<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Traits\LocalizedTrait;

use App;
class Category extends Model
{
    use SoftDeletes,LogsActivity ,LocalizedTrait;

    protected $table = 'categories';
    public $timestamps = true;
    protected $appends = ['name'];
    protected $with = ['children'];

    protected $fillable = [
         'name_ar', 'name_en','parent_id'
    ];

    protected static $logAttributes = ['name_ar', 'name_en'];
    protected static $logName = 'CoategoriesLog';

      public function getnameAttribute()
    {
        return $this->getLocaleValue($this, 'name');
    }

     function parent(){
        return $this->belongsTo(Category::class, 'parent_id')->where('parent_id',0);
    }

     function children(){
        return $this->hasMany(self::class,'parent_id','id');
    }

}

