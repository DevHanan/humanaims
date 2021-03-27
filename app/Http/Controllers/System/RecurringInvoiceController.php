<?php

namespace App\Http\Controllers\System;

use App\Models\InvoiceProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;

class RecurringInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::where('recurring',1)->latest()->get();
        return view('dashboard.recurring-invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.recurring-invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request)
    {
        $invoice = Invoice::create($request->except('products'));
                if($request->products ){

        foreach ($request->products as $product){

            $requests = $product;
            $requests['invoice_id']=$invoice->id;

            InvoiceProduct::create($requests);
        }
        }
        toast(__('Invoice Added successfully'),'success');
        return redirect(route('system.recurring-invoices.show',$invoice->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('dashboard.recurring-invoices.show',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
         $invoice = Invoice::with('products')->findOrFail($id);
        return view('dashboard.recurring-invoices.edit',compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,InvoiceRequest $request)
    {

        $invoice = Invoice::find($id);
        $invoice->fill($request->except('products'))->save();
        InvoiceProduct::where('invoice_id',$id)->delete();
                if($request->products ){

        foreach ($request->products as $product){

            $requests = $product;
            $requests['invoice_id']=$invoice->id;

            EstimateProduct::create($requests);
        }
    }
        toast(__('Invoice Edited successfully'),'success');
        return redirect(route('system.recurring-invoices.show',$invoice->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $invoice= Invoice::findOrFail($id);
        $invoice->delete();
        toast(__('Invoice Deleted successfully'),'success');
        return redirect(route('system.recurring-invoices.index'));
    }
}
