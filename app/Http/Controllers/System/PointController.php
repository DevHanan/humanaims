<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Point;
use App\Http\Requests\PointRequest;


class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     // function __construct() {
     //    $this->middleware( 'permission:list_points', [ 'only' => [ 'index' ] ] );
     //    $this->middleware( 'permission:add_points', [ 'only' => [ 'create', 'store' ] ] );
     //    $this->middleware( 'permission:edit_points', [ 'only' => [ 'edit', 'update' ] ] );
     //    $this->middleware( 'permission:delete_points', [ 'only' => [ 'destroy' ] ] );
    
    public function index()
    {
        //
        $points = Point::latest()->paginate(20);
        return view('dashboard.points.index',compact('points'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Point $model)
    {
        //
        return view('dashboard.points.create',compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PointRequest $request)
    {
       
        $point = Point::create($request->all());        
        toast(__('Point has been Added successfully'),'success');
        return redirect('system/points');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $point = Point::findOrFail($id);
        return view('dashboard.points.show',compact('point'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $point = Point::findOrFail($id);
        return view('dashboard.points.edit',compact('point'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PointRequest $request, $id)
    {
        
        $point = Point::findOrFail($id);
        $point->update($request->all());
      
        toast(__('Point has been Edited successfully'),'success');
        return redirect('system/points/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $point= point::findOrFail($id);
        $point->delete();
        toast(__('Point Deleted successfully'),'success');
        return redirect(route('system.points.index'));
    }
}
