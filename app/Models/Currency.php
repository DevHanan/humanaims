<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;
class Currency extends Model
{
    //use SoftDeletes;

    protected $table = 'currencies';
    public $timestamps = true;
    protected $appends = ['codeName'];
    protected $fillable = [
        'code_ar', 'name_ar', 'code_en', 'name_en','symbol'
    ];

    public function getCodeNameAttribute(){
    	if(App::getLocale() == 'ar')
    		return "{$this->code_ar} -  {$this->name_ar}";
    	else
    		return "{$this->code_en} -  {$this->name_en}";

    }
    public function getNameAttribute(){
    	if(App::getLocale() == 'ar')
    		return $this->name_ar;
    	else
    		return $this->name_en;
    }
    public function getCodeAttribute(){
    	if(App::getLocale() == 'ar')
    		return $this->code_ar;
    	else
    		return $this->code_en;
    }
}
