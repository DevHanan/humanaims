<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\SpecializationRequest;
use App\Models\Specialization;
use Auth;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct() {
        $this->middleware( 'permission:list_specializations', [ 'only' => [ 'index' ] ] );
        $this->middleware( 'permission:add_specializations', [ 'only' => [ 'create', 'store' ] ] );
        $this->middleware( 'permission:edit_specializations', [ 'only' => [ 'edit', 'update' ] ] );
        $this->middleware( 'permission:delete_specializations', [ 'only' => [ 'destroy' ] ] );
    }
    public function index()
    {
            $specializations = Specialization::latest()->get();
            return view('dashboard.specializations.index', compact('specializations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.specializations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(SpecializationRequest $request)
    {

        $specialization = Specialization::create($request->all());
        if ($request->is_ajax == 1){
            return ['id'=>$specialization->id,'name'=>$specialization->name];
        }
        toast(__('back.Specialization Added successfully'),'success');
        return redirect(route('system.specializations.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $specialization = Specialization::findOrFail($id);
        return view('dashboard.specializations.show',compact('specialization'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $specialization = Specialization::findOrFail($id);
        return view('dashboard.specializations.edit',compact('specialization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,SpecializationRequest $request)
    {

        $specialization = Specialization::find($id);
        $specialization->fill($request->all())->save();
        toast(__('back.Specialization Edited successfully'),'success');
        return redirect(route('system.specializations.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $specialization= Specialization::findOrFail($id);
        $checkChildrent = Specialization::where('parent_id',$specialization->id)->first();
        if($checkChildrent){
        toast(__('back.Specialization has dependent Specialization'),'warning');
        }else{
        $specialization->delete();
        toast(__('back.Specialization Deleted successfully'),'success');
    }
        return redirect(route('system.specializations.index'));
    }
}
