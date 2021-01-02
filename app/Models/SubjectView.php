<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class SubjectView extends Model
{
    
    protected $table = 'subject_views';
    protected $with = ['member'];
    public $timestamps = true;
    protected $fillable = array('subject_id', 'member_id', 'ip_address');
   

    public function subjects()
    {
        return $this->hasMany('App\Models\Subject');
    }


}
