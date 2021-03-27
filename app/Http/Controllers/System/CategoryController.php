<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct() {
        $this->middleware( 'permission:list_categories', [ 'only' => [ 'index' ] ] );
        $this->middleware( 'permission:add_categories', [ 'only' => [ 'create', 'store' ] ] );
        $this->middleware( 'permission:edit_categories', [ 'only' => [ 'edit', 'update' ] ] );
        $this->middleware( 'permission:delete_categories', [ 'only' => [ 'destroy' ] ] );
    }
    public function index()
    {
            $categories = Category::latest()->get();

            return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(CategoryRequest $request)
    {

        $Category = Category::create($request->all());
        if ($request->is_ajax == 1){
            return ['id'=>$Category->id,'name'=>$Category->name];
        }
        toast(__('back.Category Added successfully'),'success');
        return redirect(route('system.categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $component = Category::findOrFail($id);
        return view('dashboard.categories.show',compact('component'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $component = Category::findOrFail($id);
        return view('dashboard.categories.edit',compact('component'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,CategoryRequest $request)
    {

        $Category = Category::find($id);
        $Category->fill($request->all())->save();
//        $Category->syncRoles($request->role);
        toast(__('back.Category Edited successfully'),'success');
        return redirect(route('system.categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $Category= Category::findOrFail($id);
//        $Category->syncRoles([]);
        $Category->delete();
        toast(__('back.Category Deleted successfully'),'success');
        return redirect(route('system.categories.index'));
    }
}
