<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use App\Models\Role;
use Auth;
use Hash;

class RegistrationController extends Controller
{
    //
    public function index() {
        return view('auth.registration');
    }

    public function register(Request $request) {
        
        $request->validate([
            'name' => 'required|max:20|unique:App\Models\User,name',
            'email' => 'required|unique:App\Models\User,email',
            'password' => 'required'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); // encrypt our password using bcrypt
        
        //check role status:
        if($request->input('privilege') == '1') {
            $userRole = Role::where('slug', '=', 'user')->first();
            $user->role()->associate($userRole);
            $user->save();
        }
        else {
            $userRole = Role::where('slug', '=', 'merchant')->first();
            $user->role()->associate($userRole);
            $user->save();
            Shop::insert([
                'user_id' => $user->id,
            ]);
        }

        Auth::login($user);
        return redirect()->route('home');
    }
}
