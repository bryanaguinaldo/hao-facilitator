<?php

namespace App\Http\Controllers;

use App\Models\ManageRoles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;

use App\Models\User;

class ManageRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('manage-roles');
    }

    public function roles_table(Request $request)
    {
        if ($request->ajax()) {
            $roles = Role::get();
            return DataTables::of($roles)
                ->addIndexColumn()
                ->make(true);
        } else {
            return abort(404);
        }
    }

    public function permissions_table(Request $request)
    {
        if ($request->ajax()) {
            $roles = Permission::get();
            return DataTables::of($roles)
                ->addIndexColumn()
                ->make(true);
        } else {
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeRole(Request $request)
    {
        if ($request->ajax()) {
            Role::create([
                'name' => $request->input('role')
            ]);
        }
    }

    public function storePermission(Request $request)
    {
        if ($request->ajax()) {
            Permission::create([
                'name' => $request->input('permission')
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManageRoles  $manageRoles
     * @return \Illuminate\Http\Response
     */
    public function show(ManageRoles $manageRoles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManageRoles  $manageRoles
     * @return \Illuminate\Http\Response
     */
    public function edit(ManageRoles $manageRoles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManageRoles  $manageRoles
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request, ManageRoles $manageRoles)
    {
        $permission = Permission::create([
            'name' => $request->input('perms'),
        ]);

        $role = Role::findById($id);
        $permission->assignRole($role);

        $roles = User::with('roles')->get();

        return response()->json(['roles' => $roles]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManageRoles  $manageRoles
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManageRoles $manageRoles)
    {
        //
    }
}
