<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Traits\LocalizedTrait;
use App;
use Shetabit\Visitor\Traits\Visitable;

class Slider extends Model 
{

    protected $table = 'sliders';
    public $timestamps = true;

    use SoftDeletes,LogsActivity;
        use LocalizedTrait;


    protected $dates = ['deleted_at'];
    protected $fillable = array('title_ar', 'title_en','body_en','body_en');
    protected $appends = ['title','body'];
    protected static $logAttributes = ['desc_ar', 'desc_en'];
    protected static $logName = 'SlidersLog';


    public function getTitleAttribute(){

    return $this->getLocaleValue($this, 'title');
    }

 public function getBodyAttribute(){

    return $this->getLocaleValue($this, 'body');
    }


}
