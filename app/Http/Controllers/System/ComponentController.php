<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ComponentRequest;
use App\Models\Component;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct() {
        $this->middleware( 'permission:list_components', [ 'only' => [ 'index' ] ] );
        $this->middleware( 'permission:add_components', [ 'only' => [ 'create', 'store' ] ] );
        $this->middleware( 'permission:edit_components', [ 'only' => [ 'edit', 'update' ] ] );
        $this->middleware( 'permission:delete_components', [ 'only' => [ 'destroy' ] ] );
    }
    public function index()
    {
            $components = Component::latest()->get();
            return view('dashboard.components.index', compact('components'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.components.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(ComponentRequest $request)
    {

        $Component = Component::create($request->all());
        if ($request->is_ajax == 1){
            return ['id'=>$Component->id,'name'=>$Component->name];
        }
        toast(__('back.Component Added successfully'),'success');
        return redirect(route('system.components.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $component = Component::findOrFail($id);
        return view('dashboard.components.show',compact('component'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $component = Component::findOrFail($id);
        return view('dashboard.components.edit',compact('component'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,ComponentRequest $request)
    {

        $Component = Component::find($id);
        $Component->fill($request->all())->save();
//        $Component->syncRoles($request->role);
        toast(__('back.Component Edited successfully'),'success');
        return redirect(route('system.components.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $Component= Component::findOrFail($id);
//        $Component->syncRoles([]);
        $Component->delete();
        toast(__('back.Component Deleted successfully'),'success');
        return redirect(route('system.components.index'));
    }
}
