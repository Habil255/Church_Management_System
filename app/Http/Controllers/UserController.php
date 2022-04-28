<?php

namespace App\Http\Controllers;

use App\Models\ContactAddress;
use App\Models\PhysicalAddress;
use Faker\Generator as Faker;
use Spatie\LaravelIgnition\Support\Composer\FakeComposer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Faker $faker)
    {
        //
        $users = User::create([
            'first_name' => 'Habil',
            'middle_name' => '',
            'last_name' => 'Mallya',
            'username' => 'Habi255',
            'gender' => 'M',
            'date_of_birth' => $faker->date(),
            'place_of_birth' => 'Makuburi',
            'marital_status' => 'Married',
            'spouse_name' => 'Hpe',
            'email' => 'raphaelhabil09@gmail.com',
            'password' => bcrypt('105510')
        ]);
        return $users->id;
        // $users->save();
        // return "Records Inserted Successfully";


    }

    public function chartData()
    {
        $data = User::find(1)
            // ->where('first_name','Habil')
            ->get();
        // $data = User::find(1)
        //             ->where('first_name','Habil')
        //             ->get(['first_name','last_name']);



        return response()->json($data);
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
    public function showProfile()
    {
        //
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfile(Request $request, $id)
    {

        // return response()->json($request->all());
        // $msg=Blogpost::findOrFail($id);
        // $comment= new Comment();
        // $comment->name = $request->name;
        // $comment->email = $request->email;
        // $comment->phonenumber = $request->phonenumber;
        // $comment->message = $request->message;
        // $msg->comments()->save($comment);
        // return back();
        
        if ($request->hasFile('image')) {
            # code...
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
            ]);


            $user = User::findOrFail($id);
            $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        /* Store $imageName name in DATABASE from HERE */
        $user->profile_picture = $imageName;

        $user->save();

        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
       
        } else {
            # code...





            
        }
        
        $user = User::findOrFail($id);
        $user->update([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
        ]);
        $phyAdd = PhysicalAddress::where('user_id', '=', $id)->first();
        if ($phyAdd === null) {
            //if no physical address
            $address = PhysicalAddress::create([
                'user_id' => $user->id,
                'district' => $request->district,
                'street' => $request->street,
                'ward' => $request->ward,
                'house_number' => $request->house_number,
                'block_number' => $request->block_number,
            ]);
        } 
        elseif (PhysicalAddress::where('user_id', '=', $id)->exists()) {
            // user has physical address
            $address = PhysicalAddress::findOrFail($phyAdd ->id);
           
               $address->update([
                'district' => $request->district,
                'street' => $request->street,
                'ward' => $request->ward,
                'house_number' => $request->house_number,
                'block_number' => $request->block_number,
            ]);
        } {
        }


        $contacts = ContactAddress::firstOrNew([
            'user_id' => $user->id,
            'phonenumber' => $request->phonenumber,
            'postal_address' => $request->postal_address,
        ]);


        return redirect()->back();

        // $imageName = time().'.'.$request->image->extension();  
        // $request->image->move(public_path('images'), $imageName);
        // /* Store $imageName name in DATABASE from HERE */
        // return back()
        //     ->with('success','You have successfully upload image.')
        //     ->with('image',$imageName);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function imageUpload(Request $request)
    {
        //
        $request->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        /* Store $imageName name in DATABASE from HERE */
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
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
