<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class searchController extends Controller
{
    function search(){
        if(isset($_GET['query'])){
            $search_text=$_GET['query'];
            $stages=DB::table('stages')->where('id','LIKE',$search_text)->paginate(5);
            return view('admin.etudiantParEnseignant',['stages'=>$stages]);
        }else{
            return view('admin.etudiantParEnseignant');
        }


    }
}
