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
        $commitees = Commitee::all();
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
        //
        $request->validate([
            'name' => ['required'],
            'commitee' => ['required'],
        ]);
        $user = $request->username;
        return $user;
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
}
