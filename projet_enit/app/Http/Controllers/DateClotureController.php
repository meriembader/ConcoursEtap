<?php

namespace App\Http\Controllers;

use App\Date_cloture;
use Illuminate\Http\Request;

class DateClotureController extends Controller
{
    public function authorize()
    {
        return true;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
       
    } 

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
     * @param  \App\Date_cloture  $date_cloture
     * @return \Illuminate\Http\Response
     */
    public function show(Date_cloture $date_cloture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Date_cloture  $date_cloture
     * @return \Illuminate\Http\Response
     */
    public function edit(Date_cloture $date_cloture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Date_cloture  $date_cloture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Date_cloture $date_cloture)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Date_cloture  $date_cloture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Date_cloture $date_cloture)
    {
      
    }
}
