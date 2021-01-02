<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App;
class Rating extends Model
{

    protected $table = 'ratings';
    public $timestamps = true;
   
}

