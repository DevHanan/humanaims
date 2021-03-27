<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\RegionRequest;
use App\Models\Region;
use App\Models\Category;

use Auth;

class RegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct() {
        $this->middleware( 'permission:list_regions', [ 'only' => [ 'index' ] ] );
        $this->middleware( 'permission:add_regions', [ 'only' => [ 'create', 'store' ] ] );
        $this->middleware( 'permission:edit_regions', [ 'only' => [ 'edit', 'update' ] ] );
        $this->middleware( 'permission:delete_regions', [ 'only' => [ 'destroy' ] ] );
    }
    public function index()
    {
            $regions = region::latest()->get();
            return view('dashboard.regions.index', compact('regions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.regions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(RegionRequest $request)
    {

        $region = Region::create($request->all());
        if ($request->is_ajax == 1){
            return ['id'=>$region->id,'name'=>$region->name];
        }
        toast(__('back.Region Added successfully'),'success');
        return redirect(route('system.regions.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $region = Region::findOrFail($id);
        return view('dashboard.regions.show',compact('region'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $region = Region::findOrFail($id);
        return view('dashboard.regions.edit',compact('region'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,regionRequest $request)
    {

        $region = Region::find($id);
        $region->fill($request->all())->save();
        toast(__('back.Region Edited successfully'),'success');
        return redirect(route('system.regions.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $region= Region::findOrFail($id);
        $checkChildrent = Region::where('parent_id',$region->id)->first();
        if($checkChildrent){
        toast(__('back.Region has dependent Region'),'warning');
        }else{
        $region->delete();
        toast(__('back.Region Deleted successfully'),'success');
    }
        return redirect(route('system.regions.index'));
    }
}
