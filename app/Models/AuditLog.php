<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    public $table = 'activity_log';

    protected $fillable = [
        'description',
        'subject_id',
        'subject_type',
        'user_id',
        'properties',
        'host',
    ];
    
    protected $casts = [
        'properties' => 'collection',
    ];

        protected $appends = ['readableDate'];


    public function user(){
        return $this->belongsTo('App\User','causer_id');
    }



    public function loggable(){
    return $this->morphTo(null, 'subject_type', 'subject_id');    }

  public function getreadableDateAttribute(){
       
            return $this->created_at->diffForHumans();

    }

}
