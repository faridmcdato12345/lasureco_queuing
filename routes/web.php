<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('welcome');
});
Route::get('logout',function(){
    Auth::logout();
    return redirect('/login');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    //route for admin middleware
    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard',function(){
            return view('admin.dashboard');
        })->name('dashboard');
        Route::get('users',[\App\Http\Controllers\Admin\UserController::class,'index'])->name('users.index');
        Route::get('roles',[\App\Http\Controllers\Admin\RoleController::class,'index'])->name('roles.index');
    });
    //route for auth middleware only
});
