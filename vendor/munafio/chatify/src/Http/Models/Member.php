<?php

namespace Chatify\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use ChristianKuri\LaravelFavorite\Traits\Favoriteability;
use Overtrue\LaravelFollow\Followable;

class Member extends Authenticatable 
{
    use Notifiable;
       use SoftDeletes,LogsActivity;
        use Favoriteability;
use Followable;
         


    protected $table = 'members';
    protected $with = ['country'];
    protected $dates = ['deleted_at'];
    protected $guard = 'member';
    protected $appends = ['followingCount','followersCount','name'];
    public $timestamps = true;
    protected $fillable = array('fullname', 'email', 'password','image','country_id','gender',
        'age','type');
    protected static $logAttributes = ['fullname', 'email','password','image','country_id'];
    protected static $logName = 'DoctorsLog';

     public function getfollowingCountAttribute(){
        return $this->followings()->count();
    }

     public function getnameAttribute(){
        return $this->fullname;
    }

     public function getfollowerCountAttribute(){
        return $this->followers()->count();
    }


    public function subjects()
    {
        return $this->hasMany('App\Models\Subject');
    }


    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }

}