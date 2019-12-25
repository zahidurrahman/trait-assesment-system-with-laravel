<?php

namespace App\Http\Controllers;

use App\Assesment;
use Illuminate\Http\Request;


class AssesmentController extends Controller
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
        $ass = new Assesment([
            'title' => $request->input('title')
        ]);
        $ass->save();
        return redirect('/home')->with('status', 'Assesment has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assesment  $assesment
     * @return \Illuminate\Http\Response
     */
    public function show(Assesment $assesment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Assesment  $assesment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assesment $assesment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assesment  $assesment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assesment $assesment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assesment  $assesment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assesment $assesment)
    {
        //
    }
}
