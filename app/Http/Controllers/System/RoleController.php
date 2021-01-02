<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleController extends Controller
{

     function __construct() {
        $this->middleware( 'permission:list_roles', [ 'only' => [ 'index' ] ] );
        $this->middleware( 'permission:add_roles', [ 'only' => [ 'create', 'store' ] ] );
        $this->middleware( 'permission:edit_roles', [ 'only' => [ 'edit', 'update' ] ] );
        $this->middleware( 'permission:delete_roles', [ 'only' => [ 'destroy' ] ] );
    } 

    public function index()
    {
        // abort_if(Gate::denies('list_roles'), Response::HTTP_FORBIDDEN, '403 Forbidden');
            
        $roles = Role::with('permissions')->latest()->get();
        return view('dashboard.roles.index', compact('roles'));
    }

    public function create()
    {
        // abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $permissions = Permission::all()->pluck('title', 'id');
        return view('dashboard.roles.create', compact('permissions'));
    }

    public function store(RoleRequest $request)
    {
        $role = Role::create($request->all());
        $role->permissions()->sync($request->input('permissions', []));
        toast(__('back.Role has been  Added successfully'),'success');

        return redirect('system/roles');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('dashboard.roles.edit',compact('role'));
    }

    public function update( $id,RoleRequest $request)
    {
        $role = Role::find($id);
        $role->update($request->all());
        $role->permissions()->sync($request->input('permissions', []));
        toast(__('back.Role has been  edited successfully'),'success');

        return redirect('/system/roles');
    }

    public function show(Role $role)
    {
        // abort_if(Gate::denies('role_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $role->load('permissions');

        return view('dashboard.roles.show', compact('role'));
    }

    public function destroy(Role $role)
    {
        // abort_if(Gate::denies('role_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $role->permissions()->delete();
        $role->delete();
        toast(__('back.Role has been deleted successfully'),'success');

        return back();
    }


}
