<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{

     public function create_register()
    {
        return view('Auth.register');
    }


    public function store_register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'in:warga,pakrt,pakrw,staffkelurahan'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
        ]);

        if ($user->role === 'pakrt' || $user->role === 'pakrw' || $user->role === 'staffkelurahan' ) {
        $user->approval_status = true;
        $user->save();
        return Redirect::route('index')->with('success', 'Registration success. Please login!');

        } elseif ($user->role === 'warga') {
        $user->approval_status = false;
        $user->save();

        return Redirect::route('index')->with('success', 'Registration success. Please login!');
        }

    }

    public function login()
    {

        return view('Auth.login');
    }

   public function login_action(Request $request)
{
    $request->validate([
        'name' => ['required', 'string'],
        'role' => ['required', 'string', 'in:warga,pakrt,pakrw,staffkelurahan'],
        'password' => ['required', 'string'],
    ]);

   if (Auth::attempt(['name' => $request->name, 'password' => $request->password, 'role' => $request->role, 'approval_status' => true])) {
    $request->session()->regenerate();

    if (Auth::user()->role === 'warga') {
        return redirect()->route('warga.form',  ['userId' => auth()->id()]);
    } elseif (Auth::user()->role === 'pakrt') {
        return redirect()->route('pakrt.approve_users');
    } elseif (Auth::user()->role === 'pakrw') {
        return redirect()->route('index-rw');
    } elseif (Auth::user()->role === 'staffkelurahan') {
        return redirect()->route('index_kelurahan');
    }

}



    return back()->withErrors([
        'name' => 'Username or password is incorrect.',
    ]);
}


}