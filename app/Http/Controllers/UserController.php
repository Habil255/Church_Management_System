<?php

namespace App\Http\Controllers;

use Faker\Generator as Faker;
use Spatie\LaravelIgnition\Support\Composer\FakeComposer;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Faker $faker)
    {
        //
        $users=User::create([
            'first_name' => 'Habil',
            'middle_name' =>'',
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
    public function destroy($id)
    {
        //
    }
}
