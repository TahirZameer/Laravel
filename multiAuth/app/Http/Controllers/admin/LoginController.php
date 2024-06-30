<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Add this line
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('admin.login');
    }


    public function authenticate(Request $request){
        // return view('account.register');
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        if($validator->passes()){
            // return redirect()->route('account.register');

            if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])){

                if(Auth::guard('admin')->user()->role != "admin"){
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error', 'You are not allowed to access');
                }
                return redirect()->route('admin.dashboard');
            }else{
                return redirect()->route('admin.login')->with('error','Email or Password is incorrect');
            }

        }
        else{
            return redirect()->route('admin.login')
            ->withErrors($validator)->withInput();
        }
        
    }


    public function logout(){
        // Auth::logout();
        // return redirect()->route('admin.login');

        // session()->flush();
        // return redirect()->route('admin.login');
        
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
        
    }
}
