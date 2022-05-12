<?php

namespace App\Http\Controllers;

use App\Models\entreprise;
use Illuminate\Http\Request;

class entrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('addStage')->with(['entreprises'=>entreprise::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addEntreprise');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom_entreprise' => ['string', 'max:255'],
            'adress_entreprise' => ['string', 'max:255'],
            'tel_entreprise' => ['string', 'max:10'],
            'ville_entreprise' => ['string', 'max:255'],
        ]);

        entreprise::create([
            'nom_entreprise' => $request->nom_entreprise,
            'adress_entreprise' => $request->adress_entreprise,
            'tel_entreprise' => $request->tel_entreprise,
            'ville_entreprise'=>$request->ville_entreprise,
        ]);

        return redirect(route('entreprise.index'));
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
