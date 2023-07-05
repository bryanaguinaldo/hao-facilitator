<?php

namespace App\Http\Controllers;

use App\Models\AdmittedPatients;
use App\Models\ReleasedPatients;
use App\Models\UsersInformation;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function store(Request $request)
    {
        if ($request->ajax()) {
            $admitted = AdmittedPatients::where('userid', auth()->user()->id)->first();
            $released = ReleasedPatients::where('userid', auth()->user()->id)->first();

            if (!$admitted) {
                AdmittedPatients::factory()->count($request->total)->create();
            }
            if (!$released || !$admitted) {
                ReleasedPatients::factory()->count(50)->create();
            }
        }
    }

    public function index()
    {
        $user = User::with(['usersinformation'])->find(Auth::user()->id);
        return view('dashboard')->with(['user' => $user]);
    }
}
