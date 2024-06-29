<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator; // Add this line

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('account.login');
    }

    public function authenticate(Request $request){
        // return view('account.register');
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if($validator->passes()){
            // return redirect()->route('account.register');

            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                // return redirect()->route('account.dashboard');
            }else{
                return redirect()->route('account.login')->with('Email or Password is incorrect');
            }

        }
        else{
            return redirect()->route('account.login')
            ->withErrors($validator)->withInput();
        }
        
    }

    public function register(){
        return view('account.register');
    }


    public function processRegister(Request $request){
        // return view('account.register');

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        if($validator->passes()){
            // return redirect()->route('account.login');

            $user = new $User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 'customer';
            $user->save();
            return redirect()->route('account.login')->with('success', 'Registered Successfully');
        }
        else{
            return redirect()->route('account.register')
            ->withErrors($validator)->withInput();
        }

    }

    
}
