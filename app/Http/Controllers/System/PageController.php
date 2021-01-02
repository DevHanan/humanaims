<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Http\Requests\PageRequest;


class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct() {
        $this->middleware( 'permission:list_pages', [ 'only' => [ 'index' ] ] );
        $this->middleware( 'permission:add_pages', [ 'only' => [ 'create', 'store' ] ] );
        $this->middleware( 'permission:edit_pages', [ 'only' => [ 'edit', 'update' ] ] );
        $this->middleware( 'permission:delete_pages', [ 'only' => [ 'destroy' ] ] );
    }
    public function index()
    {
        //
        $pages = Page::latest()->paginate(20);
        return view('dashboard.pages.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Page $model)
    {
        //
        return view('dashboard.pages.create',compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageRequest $request)
    {
        if(!$request->slug == null)
            $request->merge(['slug'=>str_replace(' ','_',$request->title) ]);
        $page = Page::create($request->except('thumbnail'));       
        if ($request->hasFile('thumbnail'))
        {
            $image = $request->file('image');
            $destinationPath = base_path().'/uploads/pages/';
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $name = time().''.rand(11111,99999).'.'.$extension; // renameing image
            $image->move($destinationPath, $name); // uploading file to given
            $page->image = 'uploads/pages/'.$name;
            $page->save();
        }
        toast(__('Page has been Added successfully'),'success');
        return redirect('system/pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $page = Page::findOrFail($id);
        return view('dashboard.pages.show',compact('page'));
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
        $page = Page::findOrFail($id);
        return view('dashboard.pages.edit',compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, $id)
    {
        
        if($request->slug == null)
            $request->merge(['slug'=>str_replace(' ','_',$request->title) ]);
        $page = Page::findOrFail($id);
        $page->update($request->except('image'));
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $destinationPath = base_path().'/uploads/pages/';
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $name = time().''.rand(11111,99999).'.'.$extension; // renameing image
            $image->move($destinationPath, $name); // uploading file to given
            $page->image = 'uploads/pages/'.$name;
            $page->save();
        }

        toast(__('Page has been Edited successfully'),'success');
        return redirect('system/pages/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $page= page::findOrFail($id);
//        $Country->syncRoles([]);
        $page->delete();
        toast(__('Page Deleted successfully'),'success');
        return redirect(route('system.pages.index'));
    }
}