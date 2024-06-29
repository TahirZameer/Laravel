<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
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
