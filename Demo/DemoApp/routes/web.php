<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\ResourceConroller;
use App\Http\Controllers\RegistrationConroller;
use App\Models\Customer;

// route::get('/{name?}', function($name = null) {
//     $data = compact('name');
//     return view('welcome')->with($data);
//     // return view('welcome', ['name' => $name]);

//     // return view('login');
//     // return 'Login Page';
//     // return response("<h1>Login Page</h1>", 200, ["Content-Type" => "text/plain"]);
// });

// Route::view('/home', 'Home');

route::get('/', function(){
    return view('welcome');
});

route::get('/home/{user?}{id?}' , function($user=null, $id = null){
    // return view('home');
    
    // echo "Home Page";
    // echo "<br>";
    $data = compact('user', 'id');
    // print_r($data);
    //this function is used for showing array in array format
    return view('home')->with($data);

    // echo $user . " ";
    // echo $id;
});

route::get('/blade/{user?}', function($user = null){
    $data = compact('user');
    return view('practice')->with($data);
    // return view('practice');
});

// Basic Controller
route::get('/demo', [DemoController::class, 'demo']);
//route::get('/demo', [DemoController::class, 'demo']); this is laravel 8 before way of conroller calling

//route::get('/demo', 'App\Http\Controllers\DemoController@demo'); this is laravel 8 way of conroller calling



// Single Action Controller
route::get('/controller', SingleActionController::class);//we make array just to restrict in to one function of many functions




// Resource Controller
route::resource('kuchbi', ResourceConroller::class);



route::get('/contact', [RegistrationConroller::class, 'index']);
route::post('/contact', [RegistrationConroller::class, 'register']);
// route::get('/contact', function(){
//     return view('contact');
// });

route::get('/customer', function(){
    $customer = Customer::all();
    echo "<pre>";
    print_r($customer->toarray());
});