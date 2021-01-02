<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App;
class Category extends Model
{
        use SoftDeletes,LogsActivity;

    protected $table = 'categories';
    public $timestamps = true;
     protected $appends = ['name'];

    protected $fillable = [
         'name_ar', 'name_en'
    ];

 protected static $logAttributes = ['name_ar', 'name_en'];
    protected static $logName = 'CoategoriesLog';

    public function getNameAttribute(){

        if(App::getLocale() == 'ar')
            return $this->name_ar;
        else
            return $this->name_en;

    }

    public function receipts()
    {
        return $this->hasMany(Receipt::class);
    }
}

