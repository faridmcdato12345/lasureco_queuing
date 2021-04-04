<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/v1/users',[\App\Http\Controllers\Admin\Api\UserController::class,'getUsers'])->name('api.users.index');
Route::get('/v1/roles',[\App\Http\Controllers\Admin\Api\RoleController::class,'getRoles'])->name('api.roles.index');
Route::get('/v1/videos',[\App\Http\Controllers\Admin\Api\VideoController::class,'getVideos'])->name('api.videos.index');
Route::get('/v1/consumers',[\App\Http\Controllers\Admin\Api\ConsumerController::class,'getConsumers'])->name('api.consumers.index');
Route::get('/v1/cashier',[App\Http\Controllers\Admin\Api\CashierConsumerController::class,'getCashierQue'])->name('api.cashier.get');
Route::post('/v1/cashier',[App\Http\Controllers\Admin\Api\CashierConsumerController::class,'store'])->name('api.cashier');
Route::get('/v1/cashier/one',[App\Http\Controllers\Admin\Api\CashierConsumerController::class,'getCashierQueOne'])->name('api.cashier.get.one');
Route::get('/v1/cashier/update/{id}',[App\Http\Controllers\Admin\Api\CashierConsumerController::class,'patchCashier'])->name('api.cashier.update.status');
Route::get('/v1/complaint',[App\Http\Controllers\Admin\Api\ComplaintConsumerController::class,'getComplaintQue'])->name('api.complaint.get');
Route::post('/v1/complaint',[App\Http\Controllers\Admin\Api\ComplaintConsumerController::class,'store'])->name('api.complaint');
Route::get('/v1/complaint/one',[App\Http\Controllers\Admin\Api\ComplaintConsumerController::class,'getComplaintQueOne'])->name('api.complaint.get.one');
Route::get('/v1/complaint/update/{id}',[App\Http\Controllers\Admin\Api\ComplaintConsumerController::class,'patchComplaint'])->name('api.complaint.update.status');
Route::get('/v1/complaint/update/ongoing/{id}',[App\Http\Controllers\Admin\Api\ComplaintConsumerController::class,'patchComplaintonGoing'])->name('api.complaint.update.ongoing');
//api route for view
Route::get('/v1/cashier/view',[App\Http\Controllers\Admin\Api\CashierViewController::class,'getCashierView'])->name('api.cashier.view');
Route::post('/v1/cashier/view',[App\Http\Controllers\Admin\Api\CashierViewController::class,'storeCashierView'])->name('api.cashier.view.store');
Route::post('/v1/cashier/view/next',[App\Http\Controllers\Admin\Api\CashierViewController::class,'checkId'])->name('api.cashier.check.id');
Route::get('/v1/complaint/view',[App\Http\Controllers\Admin\Api\ComplaintViewController::class,'getComplaintView'])->name('api.complaint.view');
Route::post('/v1/complaint/view',[App\Http\Controllers\Admin\Api\ComplaintViewController::class,'storeComplaintView'])->name('api.complaint.view.store');
Route::post('/v1/complaint/view/next',[App\Http\Controllers\Admin\Api\ComplaintViewController::class,'checkId'])->name('api.complaint.check.id');