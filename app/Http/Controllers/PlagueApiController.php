<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plague;

class PlagueApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plagues = Plague::all()->where("deleted", "!=", 1);
        return view('api.plague_index', compact('plagues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plague.plague_create_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $plague =  new Plague;
        $plague->name = $request->input('name');
        $plague->img = $request->input('img');
        $plague->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plague = Plague::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plague = Plague::find($id);
        return view('plague.plague_update_form')->with('plague', $plague);
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
        $plague = Plague::find($id);
        $plague->name = $request->input('name');
        $plague->img = $request->input('img');
        $plague->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plague = Plague::find($id);
        $plague->deleted = 1;
        $plague->update();
    }
}
