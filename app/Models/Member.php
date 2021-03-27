<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use ChristianKuri\LaravelFavorite\Traits\Favoriteability;
use Overtrue\LaravelFollow\Followable;
use Laravelista\Comments\Commenter;
use Shetabit\Visitor\Traits\Visitable;
use Shetabit\Visitor\Traits\Visitor;
use willvincent\Rateable\Rateable;
use Auth;

class Member extends Authenticatable 
{
    use Notifiable;
    use SoftDeletes,LogsActivity;
    use Favoriteability;
    use Followable,Commenter;
        use Rateable;
         


    protected $table = 'members';

    protected $dates = ['deleted_at'];
    protected $guarded = ['member'];
    protected $appends = ['followingCount','followersCount','visits','isDoctor','isFollowed','isRate'];
    public $timestamps = true;
    protected $fillable = array('fullname', 'email', 'password','image','country_id','gender',
        'age','type','background','specialization_id','cv');
    protected static $logAttributes = ['fullname', 'email','password','image','country_id'];
    protected static $logName = 'DoctorsLog';

     public function getfollowingCountAttribute(){
        return $this->followings()->count();
    }

     public function getfollowerCountAttribute(){
        return $this->followers()->count();
    }
    public function getFollowersCountAttribute(){
             return $this->followers()->count();
   
    }

    public function getVisitsAttribute(){
        return  Visit::distinct('ip')->count('ip');
    }

    public function getIsDoctorAttribute(){
        if($this->type == 'doctor')
            return true;
        else
            return false;
    }

     public function getIsFollowedAttribute(){
        return $this->hasMany('App\Models\UserFollow','following_id')->where('follower_id',Auth::id())->count();
    }

 public function getIsRateAttribute(){
    return $this->hasMany(Rate::class,'rateable_id')->where('user_id',Auth::id())->first();
    
    }
    public function subjects()
    {
        return $this->hasMany('App\Models\Subject');
    }


     

    public function notifications(){

        return $this->hasMany(Notification::class, 'to_id');
    }

     public function unReadnotifications(){

        return $this->hasMany(Notification::class, 'to_id')->where('is_read',0);
    }
    
   

}
