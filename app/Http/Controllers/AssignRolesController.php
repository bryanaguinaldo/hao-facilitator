<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class AssignRolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            $user = User::with(['roles', 'permissions'])->get();
            return DataTables::of($user)
                ->addIndexColumn()
                ->addColumn('role', function ($row) {
                    $role = $row->getRoleNames();
                    return collect($role)->implode(' ');
                })
                ->addColumn('permissions', function ($row) {
                    $perms = $row->getPermissionNames();
                    return collect($perms)->implode(' | ');
                })
                ->addColumn('action', function ($row) {
                    $buttons = [];
                    array_push($buttons, '<button type="button" class="btn btn-dark mb-0" id="assign-role-button" data-id="' . $row->id . '"><span class="text-center text-xs text-white">Role</span></button>');
                    array_push($buttons, '<button type="button" class="btn btn-dark mb-0" id="assign-permissions-button" data-id="' . $row->id . '"><span class="text-center text-xs text-white">Permissions</span></button>');
                    return collect($buttons)->implode(' ');
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $permissions = Permission::get();
        $roles = Role::get();
        $users = User::with(['permissions'])->get();
        return view('assign-roles')->with(['permissions' => $permissions, 'users' => $users, 'roles' => $roles]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateRole(Request $request, $id)
    {
        $user = User::find($id);
        $user->syncRoles([]);
        $user->assignRole($request->input('role'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
