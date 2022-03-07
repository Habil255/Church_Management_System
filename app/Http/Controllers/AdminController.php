<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Laravel\Ui\Presets\React;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        return view('admin.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function roles()
    {
        //
        $roles=Role::get();
        return view('admin.create-roles',compact('roles'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createRoles(Request $request)
    {
        //
        $roles =Role::create([
            'title' =>$request->title,
            'Description' =>$request->description,
        ]);
        $roles->save();
        return back()->with('Role_added','Content has added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeRoles(Request $request)
    {
        $user = $request->first_name;
        $role = $request->role;
        //
        // $userRoles = Role::create([
        //     'title' => $request->first_name,
        //     'description' => $request->role,
        // ]);
        // return response()->json($userRoles);

        $userId=User::findOrFail(1)
                    ->where('first_name',$user)
                    ->first();
        $roleId=Role::findOrFail(1)
                    ->where('title',$role)
                    ->first();
         $userId->roles()
                ->attach($roleId);
            
    //             // ->detach();
        return response()->json([$userId,$roleId, 'The Role Assignment has been done']); 
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

    public function searchUser(Request $request)
    {
        //
        $user = User::select("first_name")
                    ->where("first_name","LIKE","%{$request->value}%")
                    ->limit(8)
                    ->get();
        return response()->json($user);
    }

}
