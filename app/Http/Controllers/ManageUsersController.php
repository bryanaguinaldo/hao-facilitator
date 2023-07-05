<?php

namespace App\Http\Controllers;

use App\Models\UsersInformation;
use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Http\Requests\UserStoreRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

use Yajra\DataTables\DataTables;

class ManageUsersController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\UserStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validated();
        $validated = Validator::make($request->all(), [
            'facility' => 'required|min:1000|max:1059|numeric|digits_between:4,4',
            'name' => 'required|min:5|unique:users',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);

        if ($validated->fails()) {
            return response()->json(['status' => 0, 'errors' => $validated->errors()]);
        } else {

            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);

            UsersInformation::create([
                'facility' => $request->input('facility'),
                'name' => $request->input('name'),
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
            ]);

            $user->assignRole(['Health Facilitator']);

            return response()->json([
                'status' => true,
                'title' => 'Success',
                'message' => 'Account created successfully!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function show(UsersInformation $usersInformation, User $user)
    {
    }

    /**
     * Show the form for editing the specified resource.
     * @param string $id
     * @param  \App\Models\Facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function edit($id, UsersInformation $usersInformation, User $user)
    {
        try {
            if (request()->ajax()) {
                $user = User::withTrashed()->where('id', '!=', '500')->findOrFail($id);
                $userInformation = UsersInformation::withTrashed()->where('id', '!=', '500')->findOrFail($id);

                return response()->json([
                    'status' => 1,
                    'facility' => $userInformation->facility,
                    'firstname' => $userInformation->firstname,
                    'lastname' => $userInformation->lastname,
                    'name' => $user->name,
                    'email' => $user->email,
                ]);
            }
        } catch (ModelNotFoundException $ex) {
            return response()->json([
                'status' => 0,
                'title' => 'Failure',
                'message' => 'Invalid attempt on editing selected user.'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param string $id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Facilities  $facilities
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        try {
            if (request()->ajax()) {
                $validated = Validator::make($request->all(), [
                    'facility' => 'required|min:1000|max:1059|numeric|digits_between:4,4',
                    'name' => ['required', 'min:5', Rule::unique('users')->ignore($id)],
                    'firstname' => 'required',
                    'lastname' => 'required',
                    'email' => ['required', 'email:rfc,dns', Rule::unique('users')->ignore($id)],

                ]);
                if ($validated->fails()) {
                    return response()->json([
                        'status' => 2,
                        'errors' => $validated->errors()
                    ]);
                } else {
                    User::where('id', $id)->update([
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                    ]);

                    UsersInformation::where('id', $id)->update([
                        'name' => $request->input('name'),
                        'firstname' => $request->input('firstname'),
                        'lastname' => $request->input('lastname'),
                        'facility' => $request->input('facility'),
                    ]);

                    return response()->json([
                        'status' => 1,
                        'title' => 'Success',
                        'message' => 'Account information has been updated successfully.'
                    ]);
                }
            }
        } catch (ModelNotFoundException $ex) {
            return response()->json([
                'status' => 0,
                'title' => 'Failure',
                'message' => 'An unknown error has occured.',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (request()->ajax()) {
            try {
                $user = User::where('id', '!=', '500')->findOrFail($id);
                $usersInforation = UsersInformation::findOrFail($id);

                $user->delete();
                $usersInforation->delete();
                return response()->json(['status' => 1, 'title' => 'Success', 'message' => 'User ' . $id . ' has been removed.']);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['status' => 0, 'title' => 'Failure', 'message' => 'Invalid attempt on deleting records of selected user.']);
            }
        }
        return abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        if (request()->ajax()) {
            try {
                $user = User::withTrashed()->findOrFail($id);
                $usersInforation = UsersInformation::withTrashed()->findOrFail($id);

                $user->restore();
                $usersInforation->restore();
                return response()->json(['status' => 1, 'title' => 'Success', 'message' => 'User ' . $id . ' has been restored.']);
            } catch (ModelNotFoundException $ex) {
                return response()->json(['status' => 0, 'title' => 'Failure', 'message' => 'Unable to restore user. User does not exist.']);
            }
        }
        return abort(403);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = UsersInformation::withTrashed()->get();
            return DataTables::of($users)->addIndexColumn()
                ->addColumn('photo', function ($row) {
                    return '<img src="../assets/img/blank.png" class="avatar avatar-sm me-3">';
                })
                ->addColumn('email', function ($row) {
                    return $row->user->email;
                })
                ->addColumn('username', function ($row) {
                    return $row->name;
                })
                ->addColumn('facility', function ($row) {
                    return Str::limit($row->facilities->facility_name, $limit = 35, '...');
                })
                ->addColumn('status', function ($row) {
                    return ($row->user->trashed()) ? '<span class="badge badge-pill badge-lg badge-danger">Deleted</span>' : '<span class="badge badge-pill badge-lg badge-success">Active</span>';
                })
                ->addColumn('created_at', function ($row) {
                    return ($row->created_at->format('F d, Y H:i:s'));
                })
                ->addColumn('action', function ($row) {
                    $buttons = [];
                    if ($row->trashed()) {
                        array_push($buttons, '<button type="button" class="btn btn-info mb-0" id="edit" data-id="' . $row->id . '"><span class="text-center text-xs text-white fa fa-pencil"></span></button>');
                        array_push($buttons, '<button type="button" class="btn btn-warning mb-0" id="restore" data-id="' . $row->id . '"><span class="text-center text-xs text-dark fa fa-history"></span></button>');
                    } else {
                        array_push($buttons, '<button type="button" class="btn btn-info mb-0" id="edit" data-id="' . $row->id . '"><span class="text-center text-xs text-white fa fa-pencil"></span></button>');
                        array_push($buttons, '<button type="button" class="btn btn-danger mb-0" id="delete" data-id="' . $row->id . '"><span class="text-center text-xs text-white fa fa-trash"></span></button>');
                    }
                    return collect($buttons)->implode(' ');
                })
                ->rawColumns(['photo', 'status', 'action'])
                ->make(true);
        }
        return view('manage-users');
    }
}
