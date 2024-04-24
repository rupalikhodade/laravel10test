<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //call register form page
    public function showRegistrationForm()
    {
        return view('auth.registration');
    }

    //save register data 
    public function registration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        // $check = $this->create($data);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
          ]);
        Session::flash('loginSuccess', 'You have registered successfully.');
        return redirect("login")->withSuccess('You have signed-in');
    }

    //call login page view
    public function index(){
        return view('auth.login');
    }

    //login functionality
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }
        Session::flash('loginError', 'Login credentials invalid.');
        return redirect("login");
    }

    //for dashboard page view
    public function dashboard()
    {
        $user = Auth::user();
        $postCount = Post::where('user_id', $user->id)->count();

        return view('dashboard', compact('postCount'));
    }

    //for profile page view
    public function getProfile()
    {
        
        $user = Auth::user();
        return view('auth.profile', ['user' => $user]);
    }

    //user logout functionality
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
