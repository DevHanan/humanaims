<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $table = 'invoices';
    public $timestamps = true;
    protected $with=['products'];

    protected $fillable = [
        'suffix',
        'prefix',
        'date',
        'expire_on',
        'po_so',
        'subheading',
        'footer',
        'memo',
        'customer_id',
        'currency_id',
        'recurring',
        'invoice_id',
        'number',
        'status',
        'repeated',
        'repeated_times'
    ];

    const STATUS_NEW='new';
    const STATUS_SENT='sent';
    const STATUS_Expired='expired';

    public function currency(){
        return $this->belongsTo(Currency::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }

    public function products(){
        return $this->hasMany(InvoiceProduct::class,'invoice_id');
    }

    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }

    public function invoices(){
        return $this->hasMany(Invoice::class);
    }



    public function getStatusAttribute(){
        $status = self::STATUS_NEW;

        if ($this->sent == 1){
            $status = self::STATUS_SENT;
        }
        if ($this->expire_on <= date('Y-m-d')){
            $status = self::STATUS_Expired;
        }
        return $status;
    }
    public function getStatusShowAttribute(){
        $status = [
            'name'=>__('New'),
            'color'=>'warning'
        ];

        if ($this->sent == 1){
            $status = [
                'name'=>__('Sent'),
                'color'=>'success'
            ];
        }
        if ($this->expire_on <= date('Y-m-d')){
            $status = [
                'name'=>__('Expired'),
                'color'=>'danger'
            ];
        }
        return $status;
    }

    public function getSubTotalAttribute(){
        return $this->products->sum('amount');
    }
    public function getAmountAttribute(){
        return $this->products->sum('total');
    }
    public function getTotalTaxAttribute(){
        return $this->products->sum('total_tax');
    }


    public static function selectStatusList()
    {
        return [
            self::STATUS_NEW => __('New'),
            self::STATUS_SENT => __('Sent'),
            self::STATUS_Expired => __('Expired'),
        ];
    }
}
