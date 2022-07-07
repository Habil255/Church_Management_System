<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if (!Auth::check() && $request->path() != '/login') {
            return redirect('/login'); // not logged in and not on the login page (redirect to login)
        }
        if (!Auth::check() && $request->path() == '/login') {
            return view('auth.login'); // not logged in and already on main page (render main page)
        }
    }

    public function login()
    {

        return view('auth.login'); // not logged in and already on main page (render main page)
        $user = Auth::user();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loginProcess(Request $request)
    {
        
        //
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'min:6'],
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

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();

        //     return redirect()->intended('admin/home');
        // }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);




        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user()->roles;

            // $title =Role::where('title','Accountant');
            // Automatically logout if user role isn't admin type
            if ($user[0]->title === 'Accountant') {
                return redirect('/accountant/home');
                // Auth::logout();
                $user = Auth::user()->roles;
                $role = $user[0]->title;
                return view('accountant/home', compact([

                    'user',
                    'role'
                ]));
                // return response()->json([
                //     'redirect' => '/admin/home', 
                //     'msg' => 'User, You are logged in', 
                //     'user' => $user,
                //     'role' => $user[0]->title
                // ]);

            }
            if ($user[0]->title === 'Parish Worker') {
                return redirect('parish/home');
                // Auth::logout();
                return response()->json([
                    // 'redirect' => '/', 
                    'msg' => 'User, You are logged in',
                    'user' => $user,
                    'role' => $user[0]->title
                ]);
            }

            if ($user[0]->title === 'Evangelist') {
                return redirect('evangelist/home');
                // Auth::logout();
                return response()->json([
                    // 'redirect' => '/', 
                    'msg' => 'User, You are logged in',
                    'user' => $user,
                    'role' => $user[0]->title
                ]);
            }
            if ($user[0]->title === 'Administrator') {
                return redirect('admin/home');
                // Auth::logout();
                return response()->json([
                    // 'redirect' => '/', 
                    'msg' => 'User, You are logged in',
                    'user' => $user,
                    'role' => $user[0]->title
                ]);
            }

            if ($user[0]->title === 'Pastor') {
                return redirect('pastor/home');
                // Auth::logout();
                return response()->json([
                    // 'redirect' => '/', 
                    'msg' => 'User, You are logged in',
                    'user' => $user,
                    'role' => $user[0]->title
                ]);
            }

            if ($user[0]->title === 'Congregation Secretary') {
                return redirect('secretary/home');
                // Auth::logout();
                return response()->json([
                    // 'redirect' => '/', 
                    'msg' => 'User, You are logged in',
                    'user' => $user,
                    'role' => $user[0]->title
                ]);
            }

            // return response()->json([
            //     'redirect' => '/app', 
            //     'msg' => 'Admin, You are logged in', 
            //     'user' => $user,
            //     'role' => $user[0]->title
            // ]);
        } else {
            return back()->withErrors([
                    'password' => 'The provided credentials do not match our records.',
                ]);
            return response()->json([
                'msg' => 'Incorrect login details',
            ], 401);
        }
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

    public function userLogout()
    {
        //
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        //
        // return 'habil';
        Auth::logout();
        return redirect('login');
        return response()->json([
            'msg' => 'Logout succesful',
        ], 200);
        
        // return redirect('/');
    }
}
