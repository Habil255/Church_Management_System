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
            'last_name' => 'Mallya',
            'username' => 'Habil255',
            'gender' => 'M',
            'date_of_birth' => $faker->date(),
            'place_of_birth' => 'Mabibo',
            'marital_status' => 'Married',
            'spouse_name' => 'Hadija',
            'email' => 'raphaelhabil09@gmail.com',
            'password' => bcrypt('105510')
        ]);
        $users->save();
        return "Records Inserted Successfully";


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
