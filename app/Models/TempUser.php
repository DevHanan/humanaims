<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempUser extends Model
{
    public $timestamps = true;
    protected $fillable = array('fullname', 'email', 'password','verify_code','time','expire_time','trail_number','verified');
    protected $appends=['status'];
     public function getStatusAttribute(){
        $status = [
            'name'=>__('New'),
            'color'=>'warning'
        ];

        if ($this->verified == 1){
            $status = [
                'name'=>__('back.Verified'),
                'color'=>'success'
            ];
        }
        else{
        	$status = [
                'name'=>__('back.UnVerified'),
                'color'=>'danger'
            ];
        }
        return $status;
    }
 
}
