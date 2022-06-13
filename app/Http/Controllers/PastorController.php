<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;
use PDF;

class PastorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $totalUsers = User::where("email", "!=", "raphaelhabil09@gmail.com")
            ->count();
        $usersMonthlyReg = User::selectRaw('Month(created_at) as month, count(*) as users')
            ->whereYear('created_at', '=', 2022)
            ->groupByRaw('month(created_at)')->get();
        $monthname = $usersMonthlyReg->pluck('month');
        foreach ($monthname as $key => $name) {
            # code...
            $monthname[$key] = date('F', mktime(0, 0, 0, $name, 10));
            $output[$key] = ['month' => $monthname[$key], 'users' => $usersMonthlyReg[$key]->users];
        }
        return view("pastor.home", compact('totalUsers', 'output'));
    }

    public function generatePDF()
    {
        // retreive all records from db
        $data = User::where("email", "!=", "raphaelhabil09@gmail.com")->orderBy('first_name', 'asc')->get();
        // share data to view
        view()->share('account', $data);
        $pdf = PDF::loadView('pastor.usersPDF');
        $pdf->setPaper('legal', 'landscape');
        // download PDF file with download method
        return $pdf->download('Registered Users.pdf');
    }

    public function showUsers()
    {
        $totalUsers = User::where("email", "!=", "raphaelhabil09@gmail.com")
            ->count();
        $accounts = User::where("email", "!=", "raphaelhabil09@gmail.com")->get();

        return view("pastor.view-users", compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchView()
    {
        //
        return view("pastor.search-user");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchMemberDetails(Request $request)
    {
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

    public function singleMember(Request $request)
    {
        $data = $request->input('member');
        $names = explode(' ', $data);
        $memberDetails = User::findOrFail(1)
            ->where('first_name', $names[0])
            ->where('last_name', $names[1])
            ->first();
        return view('pastor.test', compact('memberDetails'));
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
        $userDel = User::find($id)->where('id', $id)->delete();
        return back()->with('post_deleted', 'Tender has been deleted');
    }

    public function approve($id)
    {
        //
        // return 'habil';
        $user = User::find($id);
        $user->status = 1;
        $user->save();
        return back()->with('success-approve', 'User has been approved');
    }

    public function showSingleMember($id)
    {
        $user = User::findOrFail($id);
        // $phyAdd = $user->physicalAddresses();
        // return response()->json($phyAdd);
        return view('pastor.single-user', compact('user'));
    }
}
