<?php

namespace App\Models;

use App\Http\Requests\PaymentRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillPayment extends Model
{
    use SoftDeletes;

    protected $table = 'bill_payments';
    public $timestamps = true;

    protected $fillable = [
        'bill_id',//
        'date',//
        'note',//
        'payment_method_id',//
        'account_id',//
        'amount'

    ];

    public function bill(){
        return $this->belongsTo(Bill::class);
    }

    public function PaymentMethod(){
        return $this->belongsTo(PaymentMethod::class);
    }

    public function account(){
        return $this->belongsTo(Account::class,'account_id');
    }

}
