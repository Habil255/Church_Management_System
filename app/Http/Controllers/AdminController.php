<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Support\Facades\Auth;
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

    public function viewAccounts(Request $request)
    {
        //
        // $data = $request->input('search');
        // $singleUsers = User::select()
        //             ->where("name","LIKE","%{$data}%")
        //             ->get();
        

        $userInfos= User::paginate(6);
        Paginator::useBootstrap(); 
        return view('admin.user-accounts',compact('userInfos'));
    }

    public function addMember(Request $request)
    {
        //
        $password=$request->input('password');
        $newPassword = bcrypt($password);
        $users=User::create([
            'first_name' => $request->first_name,
            'middle_name' =>$request->middle_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'gender' =>$request->gender,
            'date_of_birth' =>$request->date_of_birth,
            'place_of_birth' => $request->place_of_birth,
            'marital_status' =>$request->marital_status,
            'spouse_name' => $request->spouse_name,
            'email' => $request->email,
            'password' =>$newPassword

        ]);
        // $userId = $users->id;
        $roleId=Role::find(7);
        $users->roles()->attach($roleId);
        return back()->with('success', "User Added successfully");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function roles()
    {
        
        $userDetails= User::limit(8)
                            ->get();
        // $userRoles= User::limit(8)->get();
        // $first_name= $userRoles->first_name;
        // $last_name= $userRoles->last_name;
        // $email= $userRoles->email;
        // $roles=$userRoles->roles;
        // return $roles;
        // $results=[$first_name,$last_name,$email,$roles];
        // return response()->json([$results,'These are the user details']);

        // $datas=$userRoleDetails->users[0]->first_name;
        // return response()->json($datas);
        $roles=Role::get();
        return view('admin.create-roles',compact('roles','userDetails'));

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
        // $user\ = Role::create([
        //     'title' => $request->first_name,
        //     'description' => $request->role,
        // ]);
        // return response()->json($userRoles);
        $names = explode(' ',$user);
        // 
        $userId=User::findOrFail(1)
                    ->where('first_name',$names[0])
                    ->where('last_name',$names[1])
                    ->first();
        $roleId=Role::findOrFail(1)
                    ->where('title',$role)
                    ->first();
        // return $roleId;
        $assignedRoles=$userId->roles()->get();
        
       
        // if ( count($assignedRoles) === 1) {
        //     # code...
        //     // return response()->json('The user already has a role.');
        //     return Redirect::back()->withErrors(['The user already has a role.','assigned']);
            
        //     // return back()->withErrors([
        //     //     'role' => 'The user already has a role.',
        //     // ]);
        // } else {
            # code...
            $userId->roles()
                ->sync($roleId);
        return back()->with('role_assigned','The Role has already being assigned');
        // }
        
         
    //             // ->detach();
        // return response()->json([$userId,$roleId, 'The Role Assignment has been done']); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMember($id)
    {
        //
        $showMember=User::find($id);
        return view('admin.test',compact('showMember'));
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
    public function deleteMember($id)
    {
        //
        $username =User::find($id)
                            ->where('id',$id);
                            
                        
        // return "imefika";
       $userDel=$username->delete();
        return back()->with('deleted', `User {{$userDel}} has been deleted`);
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

    public function searchUserDetails(Request $request)
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


    public function approve($id)
    {
        //
        $user = User::find($id);
        return $user->status;
        $user->status = 1;
        return 1;
        $user->save();
        return back()->with('success-approve', 'User has been approved');
    }

}
