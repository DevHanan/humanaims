<?php

namespace App\Http\Controllers\System;

use App\Http\Requests\PaymentRequest;
use App\Models\BillProduct;
use App\Models\Customer;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\BillRequest;
use App\Models\Bill;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
	
	
        $bills = Bill::where(function ($filter) use($request){

            if ($request->has('from_date') && $request->from_date != null){
                $filter->where('date','>=',$request->from_date);
            }
            if ($request->has('to_date') && $request->to_date != null){
                $filter->where('date','>=',$request->to_date);
            }
            if ($request->has('customer_id') && $request->customer_id != null){
                $filter->where('customer_id',$request->customer_id);
            }
            if ($request->has('number') && $request->number != null){
                $filter->where('number',$request->number);
            }
        })->latest()->get();
if(auth()->user()->type == 'distrib'){
$bills =  Bill::where(function ($filter) use($request){

            if ($request->has('from_date') && $request->from_date != null){
                $filter->where('date','>=',$request->from_date);
            }
            if ($request->has('to_date') && $request->to_date != null){
                $filter->where('date','>=',$request->to_date);
            }
            if ($request->has('customer_id') && $request->customer_id != null){
                $filter->where('customer_id',$request->customer_id);
            }
            if ($request->has('number') && $request->number != null){
                $filter->where('number',$request->number);
            }
        })->whereHas('customer',function($q){
		$q->where('region_id',auth()->user()->regions->pluck('id')->ToArray());
		})->latest()->get();
}
        return view('dashboard.bills.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

	$customers = Customer::whereIn('region_id',auth()->user()->regions->pluck('id')->ToArray())->get();
        return view('dashboard.bills.create',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BillRequest $request)
    {
        $bill = Bill::create($request->except('products'));
            if($request->products ){
        foreach ($request->products as $product){

            $requests = $product;
            $requests['bill_id']=$bill->id;

            BillProduct::create($requests);
        }
    }
        toast(__('Bill Added successfully'),'success');
        return redirect(route('system.bills.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $bill = Bill::findOrFail($id);

        return view('dashboard.bills.show',compact('bill'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $bill = Bill::findOrFail($id);
	$customers= Customer::whereIn('region_id',auth()->user()->regions->pluck('id')->ToArray())->get();
        return view('dashboard.bills.edit',compact('bill','customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,BillRequest $request)
    {

        $bill = Bill::find($id);
        $bill->fill($request->except('products'))->save();
        BillProduct::where('bill_id',$id)->delete();
                    if($request->products ){

        foreach ($request->products as $product){

            $requests = $product;
            $requests['bill_id']=$bill->id;

            BillProduct::create($requests);
        }
        $bill->fill($request->all())->save();
    }
        toast(__('Bill Edited successfully'),'success');
        return redirect(route('system.bills.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $bill= Bill::findOrFail($id);
//        $bill->syncRoles([]);
        $bill->delete();
        toast(__('Bill Deleted successfully'),'success');
        return redirect(route('system.bills.index'));
    }

    public function pdf($id)
    {
        $bill = Bill::findOrFail($id);
        $pdf = PDF::loadView('dashboard.bills.pdf', compact('bill'));
        return $pdf->download('bill'.$bill->number.'.pdf');

    }

    /**
     * Duplicate resource .
     *
     * @param  int  $id
     * @return Response
     */
    public function duplicate($id)
    {

        $bill= Bill::findOrFail($id);
        $data = $bill->toArray();
        $lastBillNum = optional(Bill::latest('created_at')->first())->number;
        $data['number'] =$lastBillNum+1;
        unset($data['status']);
        $newBill = Bill::create($data);
        foreach ($bill->products as $product){
            $product = $product->toArray();
            $product['bill_id'] = $newBill->id;
            BillProduct::create($product);
        }
        toast(__('Bill Duplicated successfully'),'success');
        return redirect(route('system.bills.index'));
    }
    public function paymentView($id)
    {
        return view('dashboard.bills.payment',compact('id'));
    }

    public function payment(PaymentRequest $request)
    {

        $bill = BillPayment::create($request->all());


        toast(__('Payment Added successfully'),'success');
        return redirect(route('system.bills.index'));
    }

}
