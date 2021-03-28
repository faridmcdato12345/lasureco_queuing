<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use \App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});
Route::get('logout',function(){
    Auth::logout();
    return redirect('/login');
});
Auth::routes();
Route::middleware(['auth'])->group(function () {
    //route for admin middleware
    Route::group(['middleware' => ['role:administrator']], function() { 
        Route::resource('user', UserController::class)->except('show');
        Route::patch('user/activate/{user}',[\App\Http\Controllers\Admin\UserActivateController::class,'activate'])->name('user.activate');
        Route::patch('user/deactivate/{user}',[\App\Http\Controllers\Admin\UserDeactivateController::class,'deActivate'])->name('user.deactivate');
        Route::get('roles',[\App\Http\Controllers\Admin\RoleController::class,'index'])->name('admin.roles.index');
        Route::get('dashboard',function(){
            return view('admin.dashboard');
        })->name('dashboard');
    });
    //route for auth middleware only
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


