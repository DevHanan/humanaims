<?php

namespace App\Http\Controllers\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\CountryRequest;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct() {
        $this->middleware( 'permission:list_countries', [ 'only' => [ 'index' ] ] );
        $this->middleware( 'permission:add_countries', [ 'only' => [ 'create', 'store' ] ] );
        $this->middleware( 'permission:edit_countries', [ 'only' => [ 'edit', 'update' ] ] );
        $this->middleware( 'permission:delete_countries', [ 'only' => [ 'destroy' ] ] );
    }

    public function index()
    {
            $countries = Country::latest()->get();
            return view('dashboard.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(CountryRequest $request)
    {

        $country = Country::create($request->all());
        if ($request->is_ajax == 1){
            return ['id'=>$country->id,'name'=>$country->name];
        }
        toast(__('back.Country Added successfully'),'success');
        return redirect(route('system.countries.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $country = Country::findOrFail($id);
        return view('dashboard.countries.show',compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('dashboard.countries.edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,CountryRequest $request)
    {

        $Country = Country::find($id);
        $Country->fill($request->all())->save();
        toast(__('back.Country Edited successfully'),'success');
        return redirect(route('system.countries.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $Country= Country::findOrFail($id);
//        $Country->syncRoles([]);
        $Country->delete();
        toast(__('back.Country Deleted successfully'),'success');
        return redirect(route('system.countries.index'));
    }
}
