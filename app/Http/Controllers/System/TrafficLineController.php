<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\LineRequest;
use App\Models\Line;

class TrafficLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct() {
        $this->middleware( 'permission:list_lines', [ 'only' => [ 'index' ] ] );
        $this->middleware( 'permission:add_lines', [ 'only' => [ 'create', 'store' ] ] );
        $this->middleware( 'permission:edit_lines', [ 'only' => [ 'edit', 'update' ] ] );
        $this->middleware( 'permission:delete_lines', [ 'only' => [ 'destroy' ] ] );
    }

    public function index()
    {
            $lines = Line::latest()->get();
            return view('dashboard.lines.index', compact('lines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.lines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(LineRequest $request)
    {

        $line = Line::create($request->all());
        if ($request->is_ajax == 1){
            return ['id'=>$line->id,'name'=>$line->name];
        }
        toast(__('back.Line Added successfully'),'success');
        return redirect(route('system.lines.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $line = Line::findOrFail($id);
        return view('dashboard.lines.show',compact('line'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $line = Line::findOrFail($id);
        return view('dashboard.lines.edit',compact('line'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,LineRequest $request)
    {

        $Line = Line::find($id);
        $Line->fill($request->all())->save();
        toast(__('back.Line Edited successfully'),'success');
        return redirect(route('system.lines.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $Line= Line::findOrFail($id);
//        $Line->syncRoles([]);
        $Line->delete();
        toast(__('back.Line Deleted successfully'),'success');
        return redirect(route('system.lines.index'));
    }
}
