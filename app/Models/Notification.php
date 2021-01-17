<?php

namespace App\Models;
use App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
	protected $table="notifications";
	
	protected $fillable = array('to_id', 'from_id', 'msg_ar','msg_en','notifiable_id','notifiable_type','url');

    protected $appends = ['readableDate','msg'];

    public function to()
    {
        return $this->belongsTo(Member::class,'to_id');
    }
     public function from()
    {
        return $this->belongsTo(Member::class,'from_id');
    }
     public function getreadableDateAttribute(){
       
            return $this->created_at->diffForHumans();

    }
    public function getNameAttribute(){

        if(App::getLocale() == 'ar')
            return $this->msg_ar;
        else
            return $this->msg_en;

    }

}
