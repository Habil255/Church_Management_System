<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
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

    public function viewAccounts()
    {
        //
        
        return view('admin.user-accounts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function roles()
    {
        //
        // $userRoleDetails=Role::find(1);
        // // return response()->json($userRoleDetails);
        // $datas=$userRoleDetails->users[0]->first_name;
        // return response()->json($datas);
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
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
        ]);
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
        $request->validate([
            'username' => ['required'],
            'role' => ['required'],
        ]);

        $user = $request->username;
        $role = $request->role;
        //
        // $userRoles = Role::create([
        //     'title' => $request->first_name,
        //     'description' => $request->role,
        // ]);
        // return response()->json($userRoles);
        $names = explode(' ',$user);
        
        

        $userId=User::findOrFail(1)
                    ->where('first_name',$names[0])
                    ->where('last_name',$names[1])
                    ->first();
        $roleId=Role::findOrFail(1)
                    ->where('title',$role)
                    ->first();
        $assignedRoles=$userId->roles()->get();
       
        if ( count($assignedRoles) === 1) {
            # code...
            // return response()->json('The user already has a role.');
            return Redirect::back()->withErrors(['The user already has a role.','assigned']);
            
            // return back()->withErrors([
            //     'role' => 'The user already has a role.',
            // ]);
        } else {
            # code...
            $userId->roles()
                ->attach($roleId);
        return back()->with('role_assigned','The Role has already being assigned');
        }
        
         
    //             // ->detach();
        // return response()->json([$userId,$roleId, 'The Role Assignment has been done']); 
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
        $user = User::select('*')
                    ->where("first_name","LIKE","%{$request->value}%")
                    ->limit(8)
                    ->get();
        $res = [];
        foreach ($user as $user) {
            $first_name = $user->first_name;
            $last_name = $user->last_name;
            $res[] = array("name" => "$first_name $last_name");
        }
        return response()->json($res);
    }

}
