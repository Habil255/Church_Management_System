<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use Illuminate\Http\Request;
use App\Models\User;
use PDF;
class ContributionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $users= User::Has('contributions')->get();
        // return $users;
        // foreach ($users as $user) {
        //     # code...
        //    return $user->contributions;     
        // }
            // return $users;
        return view('accountant.contributions',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchContributingMember(Request $request)
    {
        //
        return (new CommiteeController)->searchMember($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveContribution(Request $request)
    {
        if ($request->hasFile('image')) {
            # code...
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
            ]);


            // $user = User::findOrFail($id);
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }


        $church_member = $request->name;
        // $commitee = $request->category;

        $names = explode(' ', $church_member);
        $userId = User::findOrFail(1)
            ->where('first_name', $names[0])
            ->where('last_name', $names[1])
            ->first();
        $contribution = Contribution::create([
            'user_id' => $userId->id,
            'category' => $request->category,
            'payment_type' => $request->payment_type,
            'amount' => $request->amount,
            'file' =>$imageName,
        ]);
        $contribution->save();
        return back();
        // return response()->json('The Contribution has been recorded');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function contributionsPDF()
    {
        //
        $users = User::Has('contributions')->get();
        // $totalPromises = Contribution::sum('price');
        $pdf = PDF::loadView('accountant.contributionsPDF', compact('users'));
        $pdf->setPaper('legal', 'landscape');
        return $pdf->download('contributions.pdf');
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
    public function deleteContribution($id)
    {
        //
        // return 4;
        $contribution = Contribution::findorFail($id);
        // return $role->title;
        $contribution->delete();
        return back()->with('commitee_deleted', 'Role has been deleted');
    }
}
