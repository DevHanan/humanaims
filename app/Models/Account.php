<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;
class Account extends Model
{
    use SoftDeletes;

    protected $table = 'accounts';
    public $timestamps = true;

    protected $fillable = [
        'name', 'type', 'number'
    ];
}
