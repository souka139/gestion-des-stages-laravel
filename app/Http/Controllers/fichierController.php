<?php

namespace App\Http\Controllers;

use App\Models\fichier;
use Illuminate\Http\Request;
use App\Models\stage;
use App\Models\User;
use App\Models\entreprise;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class fichierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stages=stage::all();
        $entreprises=entreprise::all();
        $fichier=fichier::all();
        return view('stages')->with(['entreprises'=>$entreprises,'stages'=>$stages,'fichiers'=>$fichier]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        $stages=stage::all();
        return view('fichiers')->with(['users'=>$users,'stages'=>$stages]);
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
            'rapport_prv'=>'mimes:pdf',
            'rapport_crv'=>'mimes:pdf',
            'presentation'=>'mimes:pptx',
            'attestation'=>'mimes:pdf',
            'fiche_ev'=>'mimes:pdf',
        ]);
        if($request->hasFile('rapport_prv')){
            $r=$request->rapport_prv->store('rapport_prv','fichiers');
        }else{
            $r=null;
        }
        if($request->hasFile('rapport_crv')){
            $rc=$request->rapport_crv->store('rapport_crv','fichiers');
        }else{
            $rc=null;
        }
        if($request->hasFile('presentation')){
            $p=$request->presentation->store('presentation','fichiers');
        }else{
            $p=null;
        }
        if($request->hasFile('attestation')){
            $a=$request->attestation->store('attestation','fichiers');
        }else{
            $a=null;
        }
        if($request->hasFile('fiche_ev')){
            $f=$request->fiche_ev->store('fiche_ev','fichiers');
        }else{
            $f=null;
        }
            
        $fch=fichier::create([
                    'student_id'=>Auth::user()->id,
                    'rapport_prv'=>$r,
                    'rapport_crv'=>$rc,
                    'presentation'=>$p,
                    'attestation'=>$a,
                    'fiche_ev'=>$f,
                ]);
        if($fch){
            return redirect(route('fichier.index'))->with('oui','vos fichier a été bien enregistrés');
        }else{
            return redirect(route('fichier.index'))->with('non','Somthing went wrong !!');
        }
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
        return view('editFichiers',
        [    
            'fichier'=>fichier::find($id)
        ]);
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
        $request->validate([
            'rapport_prv'=>'mimes:pdf',
            'rapport_crv'=>'mimes:pdf',
            'presentation'=>'mimes:pptx',
            'attestation'=>'mimes:pdf',
            'fiche_ev'=>'mimes:pdf',
        ]);

        $fichier=fichier::findOrFail($id);
        if($request->hasFile('rapport_prv')){
                if($fichier->rapport_prv !=null){
                    Storage::disk('fichiers')->delete($fichier->rapport_prv);
                }
        $fch=$fichier->update(['rapport_prv'=>$request->rapport_prv->store('rapport_prv','fichiers')]);
        }elseif($request->hasFile('rapport_crv')){
            if($fichier->rapport_crv !=null){
                Storage::disk('fichiers')->delete($fichier->rapport_crv);
            }
        $fch=$fichier->update(['rapport_crv'=>$request->rapport_crv->store('rapport_crv','fichiers')]);
        }elseif($request->hasFile('presentation')){
            if($fichier->presentation !=null){
                Storage::disk('fichiers')->delete($fichier->presentation);
            }
        $fch=$fichier->update(['presentation'=>$request->presentation->store('presentation','fichiers')]);
        }elseif($request->hasFile('attestation')){
            if($fichier->attestation !=null){
                Storage::disk('fichiers')->delete($fichier->attestation);
            }
        $fch=$fichier->update(['attestation'=>$request->attestation->store('attestation','fichiers')]);
        }elseif($request->hasFile('fiche_ev')){
            if($fichier->fiche_ev !=null){
                Storage::disk('fichiers')->delete($fichier->fiche_ev);
            }
        $fch=$fichier->update(['fiche_ev'=>$request->fiche_ev->store('fiche_ev','fichiers')]);
        }

        if($fch){
            return redirect(route('fichier.index'))->with('oui','vos fichier a été bien enregistrés');
        }else{
            return redirect(route('fichier.index'))->with('non','Somthing went wrong !!');
        }
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
