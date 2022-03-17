<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;

class PastorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalUsers=User::where("email","!=","raphaelhabil09@gmail.com")
                                ->count();
        
        return view("pastor.home",compact('totalUsers'));
    }

    public function showUsers()
    {
        $totalUsers=User::where("email","!=","raphaelhabil09@gmail.com")
                                ->count();
        $accounts=User::where("email","!=","raphaelhabil09@gmail.com")->get();
        
        return view("pastor.view-users",compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function deleteMember($id)
    {
        //
        // return "imefika";
       $userDel=User::find($id)->where('id', $id)->delete();
        return back()->with('post_deleted', 'Tender has been deleted');
    }
}
