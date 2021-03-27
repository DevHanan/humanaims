<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BillProduct extends Model
{
    use SoftDeletes;

    protected $table = 'bill_product';
    public $timestamps = true;

    protected $fillable = [
        'bill_id',//
        'product_id',//
        'description',//
        'quantity',//
        'price',//
        'tax_id',//

    ];

    public function bill(){
        return $this->belongsTo(Bill::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function tax(){
        return $this->belongsTo(SaleTax::class,'tax_id');
    }

    public function getAmountAttribute(){
        return $this->quantity * $this->price;
    }
    public function getTotalTaxAttribute(){
        if (!isset($this->tax->rate)){
            return 0;
        }
        return ($this->quantity * $this->price)* ($this->tax->rate/100);
    }

    public function getTotalAttribute(){
        $total = $this->quantity * $this->price;
        $tax =0;
        if ($this->tax_id != null ){
            $tax = $total * ($this->tax->rate/100);
        }
        return $finalTotal = $total + $tax;
    }

}
