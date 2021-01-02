<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelFollow\Followable;



class Patient extends Authenticatable 
{
    
    use Notifiable,Followable,SoftDeletes,LogsActivity;
    protected $table = 'patients';
    protected $guard = 'patient';
    public $timestamps = true;
    protected $dates = ['deleted_at'];
    protected $fillable = array('fullname', 'email', 'password','image','country_id','gender','age');
      protected static $logAttributes = ['fullname', 'email','password','image','country_id'];
    protected static $logName = 'PatientsLog';


    public function subjects()
    {
        return $this->morphMany('App\Models\Subject');
    }

     public function favourites()
    {
        return $this->morphToMany('App\Models\Subject', 'favouritable');
    }

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

}