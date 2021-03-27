<?php

namespace App;

use App\Models\Role;
use App\Models\Region;
use App\Models\Line;
use App\Models\Customer;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Traits\HasPermissions;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    use LogsActivity;
    use HasRoles;

    const TYPE_SALE='sale';
    const TYPE_DISTRIB='distrib';
    const TYPE_USER='user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'default_theme','type','user_id','code'
    ];

        protected static $logAttributes = ['name', 'email','default_theme'];
        protected static $logName = 'UsersLog';
            protected $guard_name = 'web';


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','code'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    
    public function logs(){

        return $this->morphOne(AuditLog::class, 'loggable', '   subject_type ', '   subject_id');
    }


public function regions(){
        return $this->belongsToMany(Region::class);
    }

public function lines(){
        return $this->belongsToMany(Line::class);
    }

  function distributer(){
        return $this->belongsTo(User::class, 'user_id');
    }
  
    
}
