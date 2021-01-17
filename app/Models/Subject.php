<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;
use Laravelista\Comments\Commentable;
use Auth;
use Shetabit\Visitor\Traits\Visitable;

class Subject extends Model 
{

    protected $table = 'subjects';
    public $timestamps = true;

    use SoftDeletes,LogsActivity;
       use Favoriteable;
    use Commentable;
        protected $dates = ['deleted_at'];
    protected $fillable = array('body','category_id','member_id','shared');
     protected static $logAttributes = ['body'];
    protected static $logName = 'SubjectsLog';
    protected $with =['files','category','member','comments'];
    protected $appends = ['readableDate','isFavorite','viewCount','isLikable','isdisLikable','commentCount'];

    public function getreadableDateAttribute(){
       
            return $this->created_at->diffForHumans();

    }
    
     public function getIsFavoriteAttribute(){

        return $this->hasMany('App\Models\Favorite','favoriteable_id')->where(['user_id'=>Auth::id()])->count();
  
        }

        

    public function getViewCountAttribute(){

       return $this->hasMany('App\Models\SubjectView')->count();
  
        }

    public function likes(){
        return $this->hasMany('App\Models\LikeDislike','subject_id')->sum('like');
    }
    // Dislikes
    public function dislikes(){
        return $this->hasMany('App\Models\LikeDislike','subject_id')->sum('dislike');
    }

public function getIsLikableAttribute(){
        return $this->hasMany('App\Models\LikeDislike','subject_id')->where(['like'=>1,'member_id'=>Auth::id()])->count();
  
        }

        public function getIsdisLikableAttribute(){
        return $this->hasMany('App\Models\LikeDislike','subject_id')->where(['dislike'=>1,'member_id'=>Auth::id()])->count();
  
        }


    public function views()
    {
        return $this->hasMany('App\Models\SubjectView');
    }

public function comments()
    {
        return $this->hasMany('App\Models\Comment')->where('parent_id','0');
    }

    public function files()
    {
        return $this->hasMany('App\Models\File');
    }

     public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }


public function getcommentCountAttribute(){
       
            return $this->comments()->count();

    }
}