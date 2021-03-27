<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\VendorRequest;
use App\Models\Vendor;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $vendors = Vendor::latest()->get();
            return view('dashboard.vendors.index', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.vendors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(VendorRequest $request)
    {

        $vendor = Vendor::create($request->all());
        if ($request->is_ajax == 1){
            return ['id'=>$vendor->id,'name'=>$vendor->name];
        }
        toast(__('Vendor Added successfully'),'success');
        return redirect(route('system.vendors.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('dashboard.vendors.show',compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('dashboard.vendors.edit',compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,VendorRequest $request)
    {

        $Vendor = Vendor::find($id);
        $Vendor->fill($request->all())->save();
//        $Vendor->syncRoles($request->role);
        toast(__('Vendor Edited successfully'),'success');
        return redirect(route('system.vendors.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $vendor= Vendor::findOrFail($id);
//        $Vendor->syncRoles([]);
        $vendor->delete();
        toast(__('Vendor Deleted successfully'),'success');
        return redirect(route('system.vendors.index'));
    }
}
