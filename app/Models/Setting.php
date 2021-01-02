<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Traits\LocalizedTrait;

class Setting extends Model 
{
	use LogsActivity;
	use LocalizedTrait;


    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('site_name_ar', 'site_name_en', 'facebook', 'twitter', 'youtube', 'instagram', 'email', 'andriod', 'ios','terms_desc_ar','terms_desc_en','verify_expire_time');
  
  protected static $logAttributes = ['site_name_ar', 'site_name_en','facebook', 'twitter', 'youtube', 'instagram', 'email', 'andriod', 'ios','verify_expire_time'];
    protected static $logName = 'SettingLog';
    protected $appends = ['name','terms'];

     public function getnameAttribute()
    {
        return $this->getLocaleValue($this, 'site_name');
    }
     public function gettermsAttribute()
    {
        return $this->getLocaleValue($this, 'terms_desc');
    }

}