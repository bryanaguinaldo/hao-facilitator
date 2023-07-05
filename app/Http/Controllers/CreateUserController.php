<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UsersInformation;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Validator;

class CreateUserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\UserStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validated();
        $validated = $request->validate([
            'role' => 'required|min:1|max:4|numeric|digits_between:1,1',
            'facility' => 'required|min:1000|max:1058|numeric|digits_between:4,4',
            'name' => 'required|min:5|unique:users',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:5',
        ]);
        $user = User::create([
            'role' => $request->input('role'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        UsersInformation::create([
            'role' => $request->input('role'),
            'facility' => $request->input('facility'),
            'name' => $request->input('name'),
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
        ]);

        return redirect()->back()->withInput()->with([
            'status' => true,
            'message' => 'Account created successfully!'
        ]);
    }

    public function index()
    {
        return view('create-user');
    }
}
