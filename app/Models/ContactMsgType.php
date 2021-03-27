<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;
use App\Traits\LocalizedTrait;

class ContactMsgType extends Model
{
        use LocalizedTrait;
     protected $table = 'contact_msg_types';
    public $timestamps = true;
    protected $appends = ['name'];

    protected $fillable = [
        'name_ar', 'name_en'
    ];

    public function getNameAttribute(){
    return $this->getLocaleValue($this, 'name');
    }


    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }
}
