<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;

class PaymentMethod extends Model
{
use SoftDeletes;
    protected $table = 'payment_methods';
    public $timestamps = true;

    protected $fillable = [
         'name_ar', 'name_en'
    ];

    public function getNameAttribute(){
        if(App::getLocale() == 'ar')
            return $this->name_ar;
        else
            return $this->name_en;
    }
}
