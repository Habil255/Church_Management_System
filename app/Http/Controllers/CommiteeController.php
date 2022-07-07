<?php

namespace App\Http\Controllers;

use App\Models\Commitee;
use App\Models\User;
use Illuminate\Http\Request;

class CommiteeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $commitees = Commitee::withCount('users')->get();

        return view('pastor.create-commitee', compact('commitees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createCommitee(Request $request)
    {
        //
        $request->validate([
            'category' => ['required'],
            'description' => ['required'],
        ]);
        $commitee_category = Commitee::create([
            'category' => $request->category,
            'description' => $request->description,
        ]);
        $commitee_category->save();
        return back()->with('category-added', 'category has been added');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchMember(Request $request)

    {
        $query = $request->input('query');

        // dd($request);
        $user = User::select('*')
            ->where("first_name", "LIKE", "%{$query}%")
            ->limit(8)
            ->get();
        $res = [];
        foreach ($user as $user) {
            $first_name = $user->first_name;
            $last_name = $user->last_name;
            $res[] = array("name" => "$first_name $last_name");
        }
        return response()->json($res);
        // $result = (new AdminController)->searchMember($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeCommiteeMember(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'category' => ['required'],
        ]);

        $church_member = $request->name;
        $commitee = $request->category;
        //
        // $user\ = Role::create([
        //     'title' => $request->first_name,
        //     'description' => $request->role,
        // ]);
        // return response()->json($userRoles);
        $names = explode(' ', $church_member);
        $userId = User::findOrFail(1)
            ->where('first_name', $names[0])
            ->where('last_name', $names[1])
            ->first();
        $commiteeId = Commitee::findOrFail(1)
            ->where('category', $commitee)
            ->first();
        // return $roleId;
        $assignedCommitee = $userId->committees()->get();
        $userId->committees()
            ->sync($commiteeId);
        return back()->with('commitee_assigned', 'The Member has already being assigned');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewCommitee($id)
    {
        //
        $commitee = Commitee::findOrFail($id);
        return view('pastor.test',compact('commitee'));
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
    public function deleteCommitee($id)
    {
        //
        return $id;
        $commitee = Commitee::findorFail($id);
        // return $role->title;
        $commitee->delete();
        return back()->with('commitee_deleted', 'Role has been deleted');
    }
}
