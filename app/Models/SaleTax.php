<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;
class SaleTax extends Model
{

    protected $table = 'sales_tax';
    public $timestamps = true;

    protected $fillable = [
         'number', 'name','abbreviation','description','is_recoverable','is_compound','rate'
    ];
}
