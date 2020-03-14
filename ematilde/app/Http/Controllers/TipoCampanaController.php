<?php

namespace App\Http\Controllers;

use App\TipoCampana;
use Illuminate\Http\Request;

class TipoCampanaController extends Controller
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


    public function getTipoCampanas(){
        return TipoCampana::all();
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
     * @param  \App\TipoCampana  $tipoCampana
     * @return \Illuminate\Http\Response
     */
    public function show(TipoCampana $tipoCampana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TipoCampana  $tipoCampana
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoCampana $tipoCampana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TipoCampana  $tipoCampana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoCampana $tipoCampana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TipoCampana  $tipoCampana
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoCampana $tipoCampana)
    {
        //
    }
}
