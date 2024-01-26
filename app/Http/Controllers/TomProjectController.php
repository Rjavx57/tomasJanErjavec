<?php

namespace App\Http\Controllers;

use App\Models\TomProject;
use Illuminate\Http\Request;

class TomProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getProjects()
    {
        $projects = TomProject::with('tasks.reports')->get();

        return response()->json(['projects' => $projects]);
    }

    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TomProject $tomProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TomProject $tomProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TomProject $tomProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TomProject $tomProject)
    {
        //
    }
}
