<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginProcess(Request $request)
    {
        //
            $credentials=$request->validate([
                'email'=>['required','email'],
                'password'=>['required','min:6'],
            ]);

            // SIMPLE LOGIN PROCESS

            // $emailInput=$request->input('email');
            // $passwordInput=$request->input('password');
            // $userEmail =User::find(1)
            //                 ->where(['email','=',$emailInput],['password','=',$passwordInput])
            //                 ->get();
            
            // if (count($userEmail) === 1) {
            //     return 2;
            //     # code...
            // } else {
            //     # code...
            //     return response()->json($userEmail);
            // }
            



            // $request->all();

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                return redirect()->intended('admin/home');
            }
     
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
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
