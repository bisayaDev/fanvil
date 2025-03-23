<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    // Show Register/Create Form
    public function create() {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);
        $formFields['permission'] = "user";
        $formFields['status'] = "Trial";
        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in');
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');

    }

    // Show Login Form
    public function login() {
        return view('users.login');
    }

    //Edit User
    public function edit(User $user) {
        //$usr = DB::select('select * from users where id = :id', ['id' => $user->id]);
        
        return view('users.edit',[
            'user' => $user
        ]);
    }

    //Update User
    public function update(Request $request, User $user) {
        // Make sure logged in user is owner
        
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
        ]);

        
        $formFields['permission'] = $request->permission;
        $formFields['status'] = $request->status;

        $user->update($formFields);
        return redirect('/users')->with('message', 'user updated successfully!');
    }

    //Manage Users
    public function manage() {
        return view('users.index',[
            'users' => User::all()
        ]);
    }

    // Delete User
    public function destroy(User $user) {
        $user->delete();
        return redirect('/users')->with('message', 'Listing deleted successfully');
    }





    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
