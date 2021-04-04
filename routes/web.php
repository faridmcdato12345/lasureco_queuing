<?php

use App\Models\Video;
use App\Events\CashierQueChanged;
use App\Events\ComplaintQueChanged;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VideoController;

Route::get('/fire',function(){
    event(new ComplaintQueChanged);
    return 'fire';
});

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
        Route::resource('admin/user', UserController::class)->except('show');
        Route::patch('/admin/user/activate/{user}',[\App\Http\Controllers\Admin\UserActivateController::class,'activate'])->name('user.activate');
        Route::patch('/admin/user/deactivate/{user}',[\App\Http\Controllers\Admin\UserDeactivateController::class,'deActivate'])->name('user.deactivate');
        Route::get('admin/roles',[\App\Http\Controllers\Admin\RoleController::class,'index'])->name('admin.roles.index');
        Route::get('admin/consumers',[\App\Http\Controllers\Admin\ConsumerController::class,'index'])->name('admin.consumers.index');
        Route::get('admin/dashboard',function(){return view('admin.dashboard');})->name('dashboard');
        Route::get('admin/user/profile',function(){return view('admin.users.profile');})->name('user.profile');
        Route::resource('admin/video', VideoController::class)->except('show','edit','update');
    });
    //route for auth middleware only
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
Route::get('/consumer',function(){return view('consumers.index');})->name('consumer.tracking');
Route::get('/consumer/togo',function(){return view('consumers.process');});
Route::post('/consumer',[App\Http\Controllers\Admin\ConsumerController::class,'store'])->name('consumer.store');
Route::get('/post/consumer/complaint',[App\Http\Controllers\Consumer\ComplaintConsumerController::class,'store'])->name('complaint.consumer.store');
//route for viewing
Route::get('/viewing',function(){
    $videos = Video::all();
    return view('viewing.index',compact('videos'));
});