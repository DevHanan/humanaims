<?php

namespace App\Http\Controllers\System;

use App\Http\Requests\ReceiptAddRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ReceiptRequest;
use App\Models\Receipt;

class ReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receipts = Receipt::latest()->get();
        return view('dashboard.receipts.index', compact('receipts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.receipts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceiptAddRequest $request)
    {
        $requests = $request->all();
        if ($request->hasFile('file')) {
            $requests['file'] = saveImage($request->file, 'files');
            $request->files->remove('file');
        }
        $receipt = Receipt::create($requests);
        toast(__('Receipt Added successfully'),'success');
        return redirect(route('system.receipts.edit',$receipt->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $receipt = Receipt::findOrFail($id);
        return view('dashboard.receipts.show',compact('receipt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $receipt = Receipt::findOrFail($id);
        return view('dashboard.receipts.edit',compact('receipt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,ReceiptRequest $request)
    {

        $requests=$request->all();
        if ($request->hasFile('file')) {
            $requests['file'] = saveImage($request->file, 'files');
            $request->files->remove('file');
        }
        $receipt = Receipt::findOrFail($id);
        $receipt->fill($requests)->save();
        toast(__('Done successfully'),'success');
        return redirect(route('system.receipts.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $Receipt= Receipt::findOrFail($id);
        $Receipt->delete();
        toast(__('Receipt Deleted successfully'),'success');
        return redirect(route('system.receipts.index'));
    }
}
