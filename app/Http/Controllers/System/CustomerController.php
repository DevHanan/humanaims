<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('dashboard.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {

        $customer = Customer::create($request->all());

        if ($request->is_ajax == 1){
            return ['id'=>$customer->id,'name'=>$customer->name];
        }
        toast(__('Customer Added successfully'),'success');
        return redirect(route('system.customers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('dashboard.customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('dashboard.customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,CustomerRequest $request)
    {

        $Customer = Customer::find($id);
        $Customer->fill($request->all())->save();
        toast(__('Customer Edited successfully'),'success');
        return redirect(route('system.customers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $customer= Customer::findOrFail($id);
//        $Customer->syncRoles([]);
        $customer->delete();
        toast(__('Customer Deleted successfully'),'success');
        return redirect(route('system.customers.index'));
    }
}
