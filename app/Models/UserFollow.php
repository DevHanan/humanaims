<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use App;
class UserFollow extends Model
{
	protected $table='user_follower';
	    protected $fillable = array('following_id', 'follower_id', 'following_type','follower_type');


   }