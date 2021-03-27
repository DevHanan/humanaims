<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class SaleController extends Controller
{
    public function index(Request $request)
    {
	if(auth()->user()->type == 'distrib')
	 $users = User::whereHas('distributer',function($q){
			$q->where('user_id',auth()->user()->id);
		})->where('type','sale')->with('regions')->get();
	else
        $users = User::where('type','sale')->with('regions')->get();
        return view('dashboard.sales.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user=new User();
        return view('dashboard.sales.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $requests = $request->except(['regions','lines']);
        $requests['email'] = strtolower($request->email);
         $requests['type'] = 'sale';
        $requests['password']=Hash::make($request->password);
        $user = User::create($requests);
        $user->regions()->sync($request->input('regions', []));
$user->lines()->sync($request->input('lines', []));

        toast(__('sale Added successfully'),'success');
        return redirect(route('system.sales.index'));
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
        return view('dashboard.sales.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,UserRequest $request)
    {
        $requests = $request->except(['regions','lines']);
        $requests['email'] = strtolower($request->email);
        if(!is_null($request->password)){
            $requests['password']=Hash::make($request->password);
        }else{
            unset($requests['password']);
        }
        $user = User::find($id);
        $user->fill($requests)->save();
        $user->regions()->sync($request->input('regions', []));
                $user->lines()->sync($request->input('lines', []));

        toast(__('saleuter Edited Successfully'),'success');
        return redirect(route('system.sales.index'));
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
        return redirect(route('system.sales.index'));
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
