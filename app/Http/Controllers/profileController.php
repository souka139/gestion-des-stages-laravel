<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('myprofile')->with(['users' =>$users ]);
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
        return view('editProfile',
        [    
            'user'=>User::find($id)
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
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user=User::findOrFail($id);
        if($request->hasFile('profile_pic')){
            if($user->profile_pic !=null){
                Storage::disk('images')->delete($user->profile_pic);
            }
           $updated= $user->update([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                // 'password' =>  Hash::make($request->password),
                'profile_pic' => $request->profile_pic->store('users','images'),
                'phone' => $request->phone,
                'adress' => $request->adress,
                'cin' => $request->cin,
            ]);
            
        }else{
           $updated= $user->update([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName,
                'email' => $request->email,
                // 'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'adress' => $request->adress,
                'cin' => $request->cin,
            ]);
        }
        if($updated){
            return redirect(route('profile.index'))->with('yes','profile updated successfully');
        }else{
            return redirect(route('profile.index'))->with('no','somthing went wrong');
        }
    }

    public function passEdit($id){
        return view('change_password',
        [    
            'user'=>User::find($id)
        ]);
    }

    public function changePass(Request $request,$id){
        $request->validate([
            'password' => ['required_with:password-confirm', 'string', 'max:255'],
            'password-confirm' => ['required','same:password', 'string', 'max:255'],
        ]);

        $user=User::findOrFail($id);
        $updated= $user->update([
            'password' =>  Hash::make($request->password),
        ]);
        if($updated){
            return redirect(route('profile.index'))->with('yes','password changed successfully');
        }else{
            return redirect(route('profile.index'))->with('no','somthing went wrong');
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
