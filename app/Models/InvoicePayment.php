<?php

namespace App\Models;

use App\Http\Requests\PaymentRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InvoicePayment extends Model
{
    use SoftDeletes;

    protected $table = 'invoice_payments';
    public $timestamps = true;

    protected $fillable = [
        'invoice_id',//
        'date',//
        'note',//
        'payment_method_id',//
        'account_id',//
        'amount'

    ];

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }

    public function PaymentMethod(){
        return $this->belongsTo(PaymentMethod::class);
    }

    public function account(){
        return $this->belongsTo(Account::class,'account_id');
    }

}
