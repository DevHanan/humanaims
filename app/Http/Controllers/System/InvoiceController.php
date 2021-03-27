<?php

namespace App\Http\Controllers\System;

use App\Http\Requests\PaymentRequest;
use App\Models\EstimateProduct;
use App\Models\InvoicePayment;
use App\Models\InvoiceProduct;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request  $request)
    {
        $invoices = Invoice::where(function ($filter) use($request){

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

        if ($request->has('recurring')){
            $invoices = Invoice::where(function ($filter) use($request){

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
            })->where('recurring',1)->latest()->get();
            return view('dashboard.recurring-invoices.index', compact('invoices'));

        }
        return view('dashboard.invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->has('recurring')){
        return view('dashboard.recurring-invoices.create');
        }
        return view('dashboard.invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request)
    {

        $lastInvoiceNum = optional(Invoice::latest('created_at')->first())->number;
        if ($lastInvoiceNum){
            $request->merge(['number'=>$lastInvoiceNum+1]);
        }else{
            $request->merge(['number'=>1]);

        }
        if ($request->products == null){
            toast(__('Can not add empty invoice'),'error');
            return back();
        }
        $invoice = Invoice::create($request->except('products'));
        foreach ($request->products as $product){

            $requests = $product;
            $requests['invoice_id']=$invoice->id;

            InvoiceProduct::create($requests);
        }

        toast(__('Invoice Added successfully'),'success');
        if ($request->has('recurring')){
            return redirect(route('system.invoices.index',['recurring',1]));
        }
        return redirect(route('system.invoices.index'));
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

        return view('dashboard.invoices.show',compact('invoice'));
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
        return view('dashboard.invoices.edit',compact('invoice'));
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
        foreach ($request->products as $product){

            $requests = $product;
            $requests['invoice_id']=$invoice->id;

            InvoiceProduct::create($requests);
        }
        toast(__('Invoice Edited successfully'),'success');
        return redirect(route('system.invoices.index'));
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

        if ($invoice->has('invoices'));
        $invoice->invoices->delete();
        $invoice->delete();
        toast(__('Invoice Deleted successfully'),'success');
        return redirect(route('system.invoices.index'));
    }

    public function pdf($id)
    {
        $invoice = Invoice::findOrFail($id);
        $pdf = PDF::loadView('dashboard.invoices.pdf', compact('invoice'));
        return $pdf->download('invoice'.$invoice->number.'.pdf');

    }

    /**
     * Duplicate resource .
     *
     * @param  int  $id
     * @return Response
     */
    public function duplicate($id)
    {

        $invoice= Invoice::findOrFail($id);
        $data = $invoice->toArray();
        $lastInvoiceNum = optional(Invoice::latest('created_at')->first())->number;
        $data['number'] =$lastInvoiceNum+1;
        unset($data['status']);
        $newInvoice = Invoice::create($data);
        foreach ($invoice->products as $product){
            $product = $product->toArray();
            $product['invoice_id'] = $newInvoice->id;
            InvoiceProduct::create($product);
        }
        toast(__('Invoice Duplicated successfully'),'success');
        return redirect(route('system.invoices.index'));
    }
    public function paymentView($id)
    {
        return view('dashboard.invoices.payment',compact('id'));
    }

    public function payment(PaymentRequest $request)
    {

        $invoice = InvoicePayment::create($request->all());


        toast(__('Payment Added successfully'),'success');
        return redirect(route('system.invoices.index'));
    }

}
