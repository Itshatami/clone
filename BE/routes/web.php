<?php

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return view('welcome');
    } else {
        return 'access denied';
    }
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', function (Request $request) {
    $user = User::create($request->all());
    if (!$user) return 'something went worng';
    return redirect('/');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect('/');
    }
    return back()->withErrors([
        'email' => 'invalid input'
    ])->onlyInput('email');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
