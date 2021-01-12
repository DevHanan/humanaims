<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App;
class Comment extends Model
{
    protected $table = 'comments';
    public $timestamps = true;

    protected $fillable = [
         'comment', 'subject_id','member_id','parent_id'
    ];
    protected $appends = ['readableDate'];

     public function getreadableDateAttribute(){
       
            return $this->created_at->diffForHumans();

    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

       public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function parent()
{
    return $this->belongsTo('App\Models\Comment', 'parent_id');
}

public function replies()
{
    return $this->hasMany('App\Models\Comment', 'parent_id', 'id');
}

}

