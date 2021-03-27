<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DistributorController extends Controller
{
     public function index(Request $request)
    {


        $users = User::where('type','distrib')->with('regions')->get();
        return view('dashboard.distributers.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user=new User();
        return view('dashboard.distributers.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $requests = $request->except(['regions']);
        $requests['email'] = strtolower($request->email);
         $requests['type'] = 'distrib';
        $requests['password']=Hash::make($request->password);
        $user = User::create($requests);
        $user->regions()->sync($request->input('regions', []));


        toast(__('Distributer Added successfully'),'success');
        return redirect(route('system.distributers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        abort(403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.distributers.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,UserRequest $request)
    {
        $requests=$request->except('regions');
        $requests['email'] = strtolower($request->email);
        if(!is_null($request->password)){
            $requests['password']=Hash::make($request->password);
        }else{
            unset($requests['password']);
        }
        $user = User::find($id);
        $user->fill($requests)->save();
        $user->regions()->sync($request->input('regions', []));
        toast(__('Distributer Edited Successfully'),'success');
        return redirect(route('system.distributers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user= User::findOrFail($id);
//        $user->syncRoles([]);
        $user->delete();
        toast(__('Deleted successfully'),'success');
        return redirect(route('system.distributers.index'));
    }

    /**
     * Switch between dark and light theme
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switchTheme()
    {
        if (Auth::user()->default_theme == 1){
            User::find(Auth::id())->fill(['default_theme'=>0])->save();
        }else{
            User::find(Auth::id())->fill(['default_theme'=>1])->save();
        }

        return back();
    }

}
