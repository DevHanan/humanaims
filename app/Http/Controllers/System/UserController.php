<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $users = User::where(function ($q) use($request){
           if ($request->has('type') && $request->type !='' && $request->type != null){
                $q->where('type',  $request->type);
//                $q->orWhere('email', 'like', '%' . $request->name . '%');
//                $q->orWhere('phone', 'like', '%' . $request->name . '%');
           }



        })->with('roles')->get();
        
        return view('dashboard.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user=new User();
        return view('dashboard.users.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request)
    {
        $requests = $request->except(['role']);
        $requests['email'] = strtolower($request->email);
        $requests['password']=Hash::make($request->password);
        $user = User::create($requests);
       $user->syncRoles($request->role_id);

        toast(__('User Added successfully'),'success');
        return redirect(route('system.users.index'));
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

        return view('dashboard.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,UserRequest $request)
    {
        $requests=$request->except('role');
        $requests['email'] = strtolower($request->email);
        if(!is_null($request->password)){
            $requests['password']=Hash::make($request->password);
        }else{
            unset($requests['password']);
        }
        $user = User::find($id);
        $user->fill($requests)->save();
       $user->syncRoles($request->role_id);
        toast(__('User Edited Successfully'),'success');
        return redirect(route('system.users.index'));
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
        return redirect(route('system.users.index'));
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

?>
