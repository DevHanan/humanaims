<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App;

class Receipt extends Model
{
    use SoftDeletes;

    protected $table = 'receipts';
    public $timestamps = true;

    protected $fillable = [
    	'merchant',
        'date',//
        'category_id',//
        'currency_id',//
        'account_id',//
        'notes',//
        'subtotal',
        'total',
        'file'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function currency(){
        return $this->belongsTo(Currency::class);
    }

    public function account(){
        return $this->belongsTo(Account::class);
    }

    public function getStatusAttribute(){
        $status = [
            'name'=>__('Ready'),
            'color'=>'info'
        ];

        if ($this->created_at != $this->updated_at ){
            $status = [
                'name'=>__('Done'),
                'color'=>'success'
            ];
        }

        return $status;
    }
    public function getStatusNameAttribute(){
        $status = 'ready';


        if ($this->created_at != $this->updated_at ){
            $status = 'done';
        }

        return $status;
    }
}
