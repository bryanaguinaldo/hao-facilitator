<?php

namespace App\Http\Controllers;

use App\Models\AdmittedPatients;
use App\Models\ReleasedPatients;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\UsersInformation;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public $remember_me = false;

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(['name' => request('name'), 'password' => request('password')], $this->remember_me)) {
            $user = User::where(["name" => request('name')])->first();
            auth()->login($user, $this->remember_me);

            AdmittedPatients::where('userid', Auth::user()->id)->delete();
            ReleasedPatients::where('userid', Auth::user()->id)->delete();
            UsersInformation::where('id', Auth::user()->id)->update(['lastlogin' => date('Y-m-d H:i:s')]);
            return redirect()->intended('/dashboard');
        }
        return redirect()->back()->with([
            'status' => false,
            'message' => 'Incorrect username or password.'
        ]);
    }

    public function logout()
    {
        AdmittedPatients::where('userid', Auth::user()->id)->delete();
        ReleasedPatients::where('userid', Auth::user()->id)->delete();
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/');
    }

    public function index()
    {
        if (auth()->user()) {
            redirect('/dashboard');
        }
        return view('auth.login');
    }
}
