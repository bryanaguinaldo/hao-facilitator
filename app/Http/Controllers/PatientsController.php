<?php

namespace App\Http\Controllers;

use App\Models\AdmittedPatients;
use App\Models\ReleasedPatients;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Yajra\DataTables\DataTables;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('patients');
    }

    public function renderAdmitted(Request $request)
    {
        if ($request->ajax()) {
            $admitted = AdmittedPatients::where('userid', auth()->user()->id);
            return DataTables::of($admitted)->addIndexColumn()
                ->addColumn('admitted_since', function ($row) {
                    return $row->admission_date->diffForHumans();
                })
                ->addColumn('admission_date', function ($row) {
                    return date('F d, Y H:i:s', strtotime($row->admission_date));
                })
                ->addColumn('expected_release', function ($row) {
                    return date('F d, Y', strtotime($row->admission_date . ' + 14 days'));
                })
                ->make(true);
        } else {
            return abort(404);
        }
    }

    public function renderReleased(Request $request)
    {
        if ($request->ajax()) {
            $released = ReleasedPatients::where('userid', auth()->user()->id);
            return DataTables::of($released)->addIndexColumn()
                ->addColumn('release_date', function ($row) {
                    return date('F d, Y H:i:s', strtotime($row->release_date));
                })
                ->addColumn('released_since', function ($row) {
                    return $row->release_date->diffForHumans();
                })
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
