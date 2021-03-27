<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstimateProduct extends Model
{
    use SoftDeletes;

    protected $table = 'estimate_product';
    public $timestamps = true;

    protected $fillable = [
        'estimate_id',//
        'product_id',//
        'description',//
        'quantity',//
        'price',//
        'tax_id',//

    ];

    protected $appends = ['amount','total','total_tax'];

    public function estimate(){
        return $this->belongsTo(Estimate::class);
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
