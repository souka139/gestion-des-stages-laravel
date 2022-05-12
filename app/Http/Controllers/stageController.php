<?php

namespace App\Http\Controllers;

use App\Models\entreprise;
use App\Models\fichier;
use App\Models\stage;
use App\Models\User;
use App\Models\encadrant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\NotesExport;
use Illuminate\Support\Facades\DB;
use Excel;

class stageController extends Controller
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
        $fichiers=fichier::all();
        return view('stages')->with(['entreprises'=>$entreprises,'stages'=>$stages,'fichiers'=>$fichiers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addStage',['users'=>User::all()],['entreprises'=>entreprise::all()]);
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
            'nom_encadrant' => ['required', 'string', 'max:255'],
            'prenom_encadrant' => ['required', 'string', 'max:255'],
            'sujet_titre' => ['required', 'string', 'max:255'],
            'sujet_description' => ['required', 'string', 'max:400'],
            'technologies' => ['required', 'string', 'max:400'],
            // 'student1_nom' => ['required', 'string', 'max:255'],
            // 'student1_prenom' => ['required', 'string', 'max:255'],
            
        ]);

        $stg = stage::create([
            'student_id'=>Auth::user()->id,
            'entreprise_id'=>$request->entreprise_id,
            'nom_encadrant'=>$request->nom_encadrant,
            'prenom_encadrant'=>$request->prenom_encadrant,
            'sujet_titre'=>$request->sujet_titre,
            'sujet_description'=>$request->sujet_description,
            'technologies'=>$request->technologies,
            'student1_nom'=>Auth::user()->lastName,
            'student1_prenom'=>Auth::user()->firstName,
            'student2_nom'=>$request->student2_nom,
            'student2_prenom'=>$request->student2_prenom,
        ]);

        if($stg){
            return redirect(route('stage.index'))->with('ok','stage created successfully');
        }else{
            return redirect(route('stage.index'))->with('no','somthing went wrong');
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

    public function visualiserStages(){
        return view('showStages');
    }
    public function visualiserStages_Admin(){
        return view('admin.stages');
    }

    public function create_Encadrant()
    {
        $stages=stage::all();
        return view('chooseStage')->with(['stages'=>$stages]);
    }

    public function encadrer(Request $request){
        $request->validate([
            'stage_id' => ['unique:encadrants,stage_id'],
        ]);
        
       $enc= encadrant::create([
            'nom_encadrant'=>Auth::user()->lastName,
            'prenom_encadrant'=>Auth::user()->firstName,
            'stage_id'=>$request->stage_id,
        ]);

        if($enc){
            return redirect(route('stages.show'))->with('oui','opération bien effectuée');
        }else{
            return redirect(route('stages.show'))->with('non','somthing went wrong');
        }
    }


    // validation pour soutenance
    public function validerPage($id){
        return view('validerStage',[
            'encadrant'=>encadrant::findOrFail($id)
        ]);
    }

    public function valider(Request $request,$id){
        $stage=encadrant::findOrFail($id);
        $valide= $stage->update([
            'stage_id'=>$request->stage_id,
            'soutenance' => 'valide'
        ]);

        if($valide){
            return redirect(route('stages.show'))->with('oui','opération bien effectuée');
        }else{
            return redirect(route('stages.show'))->with('non','somthing went wrong');
        }
    }

    // noté le stage
    public function notePage($id){
        return view('note',[
            'encadrant'=>encadrant::findOrFail($id)
        ]);
    }

    public function note(Request $request,$id){
        $stage=encadrant::findOrFail($id);
        $valide= $stage->update([
            'stage_id'=>$request->stage_id,
            'note' =>$request->note,
        ]);

        if($valide){
            return redirect(route('stages.show'))->with('oui','opération bien effectuée');
        }else{
            return redirect(route('stages.show'))->with('non','somthing went wrong');
        }
    }

    // etudiants sans rapport
    public function visualiséStudentWRapp(){
        return view('admin.et_sans_rapport')->with([
            'stages'=>stage::all(),
            'fichiers'=>fichier::all()
        ]);
    }

    // les stages validés
    public function visualiséStagesValide(){
        return view('admin.stagesValide')->with([
            'stages'=>stage::all(),
            'encadrants'=>encadrant::all(),
            'entreprises'=>entreprise::all()
        ]);
    }
    // les nots
    public function visualiséNotes(){
        return view('admin.notes')->with([
            'stages'=>stage::all(),
            'encadrants'=>encadrant::all(),
        ]);
    }

    // etudiant par enseignat
    public function showEtudiants(){
        return view('admin.etudiantParEnseignant')->with([
            'stages'=>stage::all(),
            'encadrants'=>encadrant::all(),
            'users'=>User::all()
        ]);
    }

    // export
    public function exportToExcel(){
        return Excel::download(new NotesExport,'notesListe.xlsx');
    }

}
