<?php

namespace App\Http\Controllers;

use App\Models\encadrant;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::paginate(10);
        $roles=Role::all();
        return view('admin.users.index')->with(['users' =>$users ],['roles',$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *  @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response 
     * 
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create()
    {
        return view('admin.users.create',['roles'=>Role::all()]);
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
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);

        $user = User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles',
        ]);
        $user->roles()->sync($request->roles);
        $ok=event(new Registered($user));

        if($ok){
            return redirect(route('user.index'))->with('ok','user created successfully');
        }else{
            return redirect(route('user.index'))->with('no','somthing went wrong');
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
        return view('admin.users.edit',
        [    
            'roles'=>Role::all(),
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
        $user=User::findOrFail($id);
        $user->update([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'email' => $request->email,
            // 'password' => Hash::make($request->password),
            'roles',
        ]);

        $user->roles()->sync($request->roles);
        
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted=User::destroy($id);
        if($deleted){
            return redirect(route('user.index'))->with('yes','user deleted successfully');
        }else{
            return redirect(route('user.index'))->with('non','somthing went wrong');
        }
    }


}
