<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Traits\LocalizedTrait;
use App;
use Shetabit\Visitor\Traits\Visitable;

class Page extends Model 
{

    protected $table = 'pages';
    public $timestamps = true;

    use SoftDeletes,LogsActivity;
        use LocalizedTrait;


    protected $dates = ['deleted_at'];
    protected $fillable = array('title_ar', 'title_en', 'body_ar', 'body_en', 
    	'image','type');
    protected $appends = ['title','body'];
    protected static $logAttributes = ['title_ar', 'title_en','body_ar','body_en'];
    protected static $logName = 'PagesLog';


    public function getTitleAttribute(){

    return $this->getLocaleValue($this, 'title');
    }

     public function getBodyAttribute(){
                return $this->getLocaleValue($this, 'body');
    }

}
