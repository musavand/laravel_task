<?php

namespace App\Http\Controllers;

use App\Models\TableA;
use Illuminate\Http\Request;

class TableAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('TableA\AddTableA');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'user_star' => 'required',
           
        ], [
            'name.required' => 'Name field is required.',
            'user_star.required' => 'User Star field is required.',
           
        ]);

    
        $user = TableA::create($validatedData);
      
        return back()->with('success', 'Table created successfully.');

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TableA  $tableA
     * @return \Illuminate\Http\Response
     */
    public function show(TableA $tableA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TableA  $tableA
     * @return \Illuminate\Http\Response
     */
    public function edit(TableA $tableA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TableA  $tableA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TableA $tableA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TableA  $tableA
     * @return \Illuminate\Http\Response
     */
    public function destroy(TableA $tableA)
    {
        //
    }
}
