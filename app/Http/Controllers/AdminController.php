<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;

use Illuminate\Support\Facades\File;
use PDF;

class AdminController extends Controller
{
    /**
     *
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $totalUsers = User::get()->count();
        $usersMonthlyReg = User::selectRaw('Month(created_at) as month, count(*) as users')
                        ->whereYear('created_at','=',2022)
                        ->groupByRaw('month(created_at)')->get();
        $monthname = $usersMonthlyReg->pluck('month');
       foreach ($monthname as $key => $name) {
           # code...
              $monthname[$key] = date('F', mktime(0, 0, 0, $name, 10));
                $output[$key] = ['month' => $monthname[$key], 'users' => $usersMonthlyReg[$key]->users];
       } 
   
        $withSpecialRoles = User::whereHas('roles', function ($query) {
            $query->where('title', '!=', 'Normal');
        })->count();
        $data = [10,30];

        $normalUsers = $totalUsers - $withSpecialRoles;
            return view('admin.home', compact('totalUsers', 
                                            'withSpecialRoles', 
                                            'normalUsers',
                                            'data', 
                                            'output'));
    }

    public function viewAccounts(Request $request)
    {
        //
        // $data = $request->input('search');
        // $singleUsers = User::select()
        //             ->where("name","LIKE","%{$data}%")
        //             ->get();

        
        $userInfos = User::get();
        // return $userInfos;
        // $userInfos->physicalAddresses->district;
        // return $userInfos;
        return view('admin.user-accounts', compact('userInfos'))->with('loader',true);
    }
    public function createPDF() {
        // retreive all records from db
        $data = User::select()->orderBy('first_name', 'asc')->get();
        // share data to view
        view()->share('userInfo',$data);
        $pdf = PDF::loadView('myPDF2');
        $pdf->setPaper('legal', 'landscape');
        // download PDF file with download method
        return $pdf->download('RegisteredUsers.pdf');
      }

    public function addMember(Request $request)
    {
        //
        $password = $request->input('password');
        $newPassword = bcrypt($password);
        $users = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'place_of_birth' => $request->place_of_birth,
            'marital_status' => $request->marital_status,
            'spouse_name' => $request->spouse_name,
            'email' => $request->email,
            'password' => $newPassword

        ]);
        // $userId = $users->id;
        $roleId = Role::find(7);
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

        $userDetails = User::whereHas('roles', function ($query) {
            $query->where('title', '!=', 'Normal');
        })->get();
       
        $roles = Role::get();
        return view('admin.create-roles', compact('roles', 'userDetails'));
    }

    /**
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
        $roles = Role::create([
            'title' => $request->title,
            'Description' => $request->description,
        ]);
        $roles->save();
        return back()->with('Role_added', 'Role has added');
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
        $names = explode(' ', $user);
        // 
        $userId = User::findOrFail(1)
            ->where('first_name', $names[0])
            ->where('last_name', $names[1])
            ->first();
        $roleId = Role::findOrFail(1)
            ->where('title', $role)
            ->first();
        // return $roleId;
        $assignedRoles = $userId->roles()->get();
        $userId->roles()
            ->sync($roleId);
        return back()->with('role_assigned', 'The Role has already being assigned');
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
        $showMember = User::find($id);
        return view('admin.test', compact('showMember'));
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


        // Image::where("id", $image->id)->delete();
        //
        $username = User::find($id);
            // ->where('id', $id);
            // $hasImage = User::where('id',$id)->whereNotNull('profile_picture')->exists();
            $filePathName = '/images/' . $username->profile_picture;  
        if (File::exists($filePathName)) {
            
            # code...
            File::delete($filePathName);
            // $image_path = public_path() . '/images/' . $username->profile_picture;
            // unlink($image_path);
           

        } 
        // return 'Habil';
        // $image_path = public_path().'/'.$username->profile_picture;
        // unlink($image_path);
        //     # code...
        //     unlink($image_path);
        // } 
        // return 'imefika';
         $username->delete();
        return back()->with('deleted', `User  has been deleted`);
    }

    public function searchUser(Request $request)
    {
        //
        $user = User::select('*')
            ->where("first_name", "LIKE", "%{$request->value}%")
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

    // public function searchUserDetails(Request $request)
    // {
    //     //
    //     $user = User::select('*')
    //         ->where("first_name", "LIKE", "%{$request->value}%")
    //         ->limit(8)
    //         ->get();
    //     $res = [];
    //     foreach ($user as $user) {
    //         $first_name = $user->first_name;
    //         $last_name = $user->last_name;
    //         $res[] = array("name" => "$first_name $last_name");
    //     }
    //     return response()->json($res);
    // }


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

    public function deleteRoles($id)
    {
        //
        // return $id;
        $role = Role::findorFail($id);
        // return $role->title;
        $role->delete();
        return back()->with('role_deleted', 'Role has been deleted');
    }

    public function editRoles($id)
    {
        //
        // return $id;
        // $role = Role::find($id);
        // return $role;
        return back();
        // return back()->with('role_deleted', 'Role has been deleted');
    }
}
