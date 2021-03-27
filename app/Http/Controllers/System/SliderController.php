<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Http\Requests\SliderRequest;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function __construct() {
        $this->middleware( 'permission:list_sliders', [ 'only' => [ 'index' ] ] );
        $this->middleware( 'permission:add_sliders', [ 'only' => [ 'create', 'store' ] ] );
        $this->middleware( 'permission:edit_sliders', [ 'only' => [ 'edit', 'update' ] ] );
        $this->middleware( 'permission:delete_sliders', [ 'only' => [ 'destroy' ] ] );
    }
    public function index()
    {
        //
        $sliders = Slider::latest()->paginate(20);
        return view('dashboard.sliders.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Slider $model)
    {
        //
        return view('dashboard.sliders.create',compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        if(!$request->slug == null)
            $request->merge(['slug'=>str_replace(' ','_',$request->title) ]);
        $slider = Slider::create($request->except('thumbnail'));       
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $destinationPath = base_path().'/uploads/sliders/';
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $name = time().''.rand(11111,99999).'.'.$extension; // renameing image
            $image->move($destinationPath, $name); // uploading file to given
            $slider->image = 'uploads/sliders/'.$name;
            $slider->save();
        }
        toast(__('Slider has been Added successfully'),'success');
        return redirect('system/sliders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $slider = Slider::findOrFail($id);
        return view('dashboard.sliders.show',compact('slider'));
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
        $slider = Slider::findOrFail($id);
        return view('dashboard.sliders.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $id)
    {
        
        if($request->slug == null)
            $request->merge(['slug'=>str_replace(' ','_',$request->title) ]);
        $slider = Slider::findOrFail($id);
        $slider->update($request->except('image'));
        if ($request->hasFile('image'))
        {
            $image = $request->file('image');
            $destinationPath = base_path().'/uploads/sliders/';
            $extension = $image->getClientOriginalExtension(); // getting image extension
            $name = time().''.rand(11111,99999).'.'.$extension; // renameing image
            $image->move($destinationPath, $name); // uploading file to given
            $slider->image = 'uploads/sliders/'.$name;
            $slider->save();
        }

        toast(__('Slider has been Edited successfully'),'success');
        return redirect('system/sliders/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $slider= slider::findOrFail($id);
        $slider->delete();
        toast(__('Slider Deleted successfully'),'success');
        return redirect(route('system.sliders.index'));
    }
}
