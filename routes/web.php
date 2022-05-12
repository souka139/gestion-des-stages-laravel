<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route for both
Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard','App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/dashboard/myprofile','App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
    Route::post('/dashboard/profile/update/{id}','App\Http\Controllers\profileController@update')->name('profile.update');
    Route::get('/dashboard/profile/edit/{id}','App\Http\Controllers\profileController@edit')->name('profile.edit');
    Route::get('/dashboard/profile','App\Http\Controllers\profileController@index')->name('profile.index');

    Route::get('/dashboard/profile/change_password/{id}','App\Http\Controllers\profileController@passEdit')->name('profile.passEdit');
    Route::post('/dashboard/profile/change_password/{id}','App\Http\Controllers\profileController@changePass')->name('profile.changePass');
});

// for student
Route::group(['middleware' => ['auth','role:student']], function(){
    Route::get('/dashboard/student/stage','App\Http\Controllers\stageController@index')->name('stage.index');
    Route::get('/dashboard/student/add_stage','App\Http\Controllers\stageController@create')->name('stage.create');
    Route::post('/dashboard/student/add_stage','App\Http\Controllers\stageController@store')->name('stage.store');
    Route::get('/dashboard/student/add_entreprise','App\Http\Controllers\entrepriseController@create')->name('entreprise.create');
    Route::post('/dashboard/student/add_entreprise','App\Http\Controllers\entrepriseController@store')->name('entreprise.store');
    Route::get('/dashboard/student/entreprise','App\Http\Controllers\entrepriseController@index')->name('entreprise.index');

    Route::get('/dashboard/student/stage/add_fichier','App\Http\Controllers\fichierController@create')->name('fichier.create');
    Route::post('/dashboard/student/add_fichier','App\Http\Controllers\fichierController@store')->name('fichier.store');
    Route::get('/dashboard/student/stage_avec_fichier','App\Http\Controllers\fichierController@index')->name('fichier.index');

    Route::get('/dashboard/student/editFichier/{id}','App\Http\Controllers\fichierController@edit')->name('fichier.edit');
    Route::post('/dashboard/student/editFichier/{id}','App\Http\Controllers\fichierController@update')->name('fichier.update');

});

// for teacher
Route::group(['middleware' => ['auth','role:teacher']], function(){
    Route::get('/dashboard/teacher/stages','App\Http\Controllers\stageController@visualiserStages')->name('stages.show');
    Route::get('/dashboard/teacher/stages/chooseStage','App\Http\Controllers\stageController@create_Encadrant')->name('stages.create');
    Route::post('/dashboard/teacher/stages/chooseStage','App\Http\Controllers\stageController@encadrer')->name('stages.store');
    Route::post('/dashboard/teacher/stages/valider/{id}','App\Http\Controllers\stageController@valider')->name('stages.valider');
    Route::get('/dashboard/teacher/stages/valider/{id}','App\Http\Controllers\stageController@validerPage')->name('stages.validerpage');
    Route::post('/dashboard/teacher/stages/valider/note/{id}','App\Http\Controllers\stageController@note')->name('stages.note');
    Route::get('/dashboard/teacher/stages/valider/note/{id}','App\Http\Controllers\stageController@notePage')->name('stages.notepage');
});
// for admin
Route::group(['middleware' => ['auth','role:admin']], function(){
    Route::get('/dashboard/users','App\Http\Controllers\UserController@index')->name('user.index');
    Route::get('/dashboard/users/edit/{id}','App\Http\Controllers\UserController@edit')->name('user.edit');
    Route::get('/dashboard/users/delete/{id}','App\Http\Controllers\UserController@destroy')->name('user.destroy');
    Route::post('/dashboard/users/create','App\Http\Controllers\UserController@store')->name('user.store');
    Route::get('/dashboard/users/create','App\Http\Controllers\UserController@create')->name('user.create');
    Route::post('/dashboard/users/update/{id}','App\Http\Controllers\UserController@update')->name('user.update');
    Route::get('/dashboard/admin/stages','App\Http\Controllers\stageController@visualiserStages_Admin')->name('stagesAdmin.show');
    Route::get('/dashboard/admin/stages/etudiants_sans_encadrant','App\Http\Controllers\stageController@visualiséStudentWEnc')->name('etSansEnc.show');
    Route::get('/dashboard/admin/stages/etudiants_sans_rapport','App\Http\Controllers\stageController@visualiséStudentWRapp')->name('etSansRapport.show');
    Route::get('/dashboard/admin/stages/Stages_valide','App\Http\Controllers\stageController@visualiséStagesValide')->name('stagesValide.show');
    Route::get('/dashboard/admin/stages/Stages_valide/notes','App\Http\Controllers\stageController@visualiséNotes')->name('notes.show');
    Route::get('/dashboard/admin/Etudiants','App\Http\Controllers\stageController@showEtudiants')->name('etudiants.show');
    Route::get('/dashboard/admin/Etudiants/search','App\Http\Controllers\searchController@search')->name('etudiant.search');
    Route::get('/dashboard/admin/Etudiants/Export','App\Http\Controllers\stageController@exportToExcel')->name('etudiant.exportToExcel');

});


require __DIR__.'/auth.php';
