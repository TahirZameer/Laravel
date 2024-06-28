<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistrationConroller extends Controller
{
    public function index(){
        return view('contact');
    }
    public function register(Request $request){
        $request -> validate(
                [
                    // 'name' => required,
                    // 'email' => required, 
                    // 'password' => 'required', 
                    // 'ConfirmPassword' => 'required',
                    // 'description' =>
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|max:255',
                    // 'password' => 'required|confirmed',
                    // 'password_confirmation' => 'required',

                    'password' => 'required',
                    // 'password_confirm' => 'required|same:password',
                    'password_confirmation' => 'required|same:password',
                    'description' => 'nullable|string|max:1000',
                ]
            );

        echo "<pre>";
        print_r($request->all());

        // return response()->json(['message' => 'Form submitted successfully']);
    }
}
