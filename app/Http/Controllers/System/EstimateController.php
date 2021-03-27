<?php

namespace App\Http\Controllers\System;

use App\Models\EstimateProduct;
use App\Models\Invoice;
use App\Models\InvoiceProduct;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\EstimateRequest;
use App\Models\Estimate;

class EstimateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $estimates = Estimate::where(function ($filter) use($request){

            if ($request->has('from_date') && $request->from_date != null){
                $filter->where('date','>=',$request->from_date);
            }
            if ($request->has('to_date') && $request->to_date != null){
                $filter->where('date','>=',$request->to_date);
            }
            if ($request->has('customer_id') && $request->customer_id != null){
                $filter->where('customer_id',$request->customer_id);
            }
        })->latest()->get();
        if ($request->has('status') && $request->status != null){
            $estimates =  $estimates->where('status',$request->status);
        }
        return view('dashboard.estimates.index', compact('estimates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.estimates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EstimateRequest $request)
    {
        $estimate = Estimate::create($request->except('products'));
        if($request->products ){
        foreach ($request->products as $product){

            $requests = $product;
            $requests['estimate_id']=$estimate->id;

            EstimateProduct::create($requests);
        }
    }

        toast(__('Estimate Added successfully'),'success');
        return redirect(route('system.estimates.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $estimate = Estimate::findOrFail($id);
        return view('dashboard.estimates.show',compact('estimate'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function pdf($id)
    {
        $estimate = Estimate::findOrFail($id);
        $pdf = PDF::loadView('dashboard.estimates.pdf', compact('estimate'));
        return $pdf->download('estimate-'.$estimate->prefix.'-'.$estimate->suffix.'.pdf');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
         $estimate = Estimate::with('products')->findOrFail($id);
        return view('dashboard.estimates.edit',compact('estimate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,EstimateRequest $request)
    {

        $estimate = Estimate::find($id);
        $estimate->fill($request->except('products'))->save();
        EstimateProduct::where('estimate_id',$id)->delete();
        if($request->products ){
        foreach ($request->products as $product){
            $requests = $product;
            $requests['estimate_id']=$estimate->id;
            EstimateProduct::create($requests);
        }
    }
        toast(__('Estimate Edited successfully'),'success');
        return redirect(route('system.estimates.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $estimate= Estimate::findOrFail($id);
//        $estimate->syncRoles([]);
        $estimate->delete();
        toast(__('Estimate Deleted successfully'),'success');
        return redirect(route('system.estimates.index'));
    }

    /**
     * Duplicate resource .
     *
     * @param  int  $id
     * @return Response
     */
    public function duplicate($id)
    {
        $estimate= Estimate::findOrFail($id);
        $data = $estimate->toArray();
        $data['suffix'] = $estimate->suffix .'-copy';
        $newEstimate = Estimate::create($data);
        foreach ($estimate->products as $product){
            $product = $product->toArray();
            $product['estimate_id'] = $newEstimate->id;
            EstimateProduct::create($product);
        }
        toast(__('Estimate Duplicated successfully'),'success');
        return redirect(route('system.estimates.index'));
    }
    /**
     * Duplicate resource to invoice.
     *
     * @param  int  $id
     * @return Response
     */
    public function convert($id)
    {
        $estimate= Estimate::findOrFail($id);
        $data = $estimate->toArray();
        $lastInvoice = Invoice::latest('created_at')->first();
        if ($lastInvoice == null){
            $count =1;
        }
        else{
            $count = Invoice::latest('created_at')->first()->number +1;
        }

        $data['suffix'] = $estimate->suffix .'-copy';
        $data['number'] = $count;
        $data['status'] = 0;
        $invoice = Invoice::create($data);
        foreach ($estimate->products as $product){
            $product = $product->toArray();
            $product['invoice_id'] = $invoice->id;
            InvoiceProduct::create($product);
        }
        toast(__('Estimate converted to invoice successfully'),'success');
        return redirect(route('system.estimates.index'));
    }
}
