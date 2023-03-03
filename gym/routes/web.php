<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthenticatedSessionController;





// use App\Http\Controllers\Employee\EmployeeController;

use App\Http\Controllers\backend\Dashboard\DashboardController;
use App\Http\Controllers\backend\Auth\AuthController;

use App\Http\Controllers\backend\Auth\RoleController;
use App\Http\Controllers\backend\Auth\PermissionController;
use App\Http\Controllers\backend\Auth\UserController;

use App\Http\Controllers\backend\ComingsoonController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/






Route::get('/login',[AuthController::class,'loginPageView'])->name('login');
Route::get('/login-page',[AuthController::class,'loginPageView'])->name('loginpage');
Route::post('/loginpost',[AuthController::class,'login'])->name('do-login');





Route::middleware(['web','auth'])->group(function () {
    
    Route::get('/',[DashboardController::class,'view'])->name('dashboard');

    Route::get('/dashboard',[DashboardController::class,'view'])->name('dashboard');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout');


    Route::group(['prefix'=>'profile','as' => 'profile.'],function(){
        Route::get('view',[ComingsoonController::class,'view'])->name('profileview');
        Route::get('change_password',[AuthController::class,'change_password'])->name('change_password');
        Route::post('save_password',[AuthController::class,'save_password'])->name('save_password');
    });

     

    Route::get('/dashboard_stats',[DashboardController::class,'dashboardStats'])->name('dashboard_stats');

    Route::group(['prefix'=>'usermanagement','as' => 'usermanagement.'],function(){

        //Role
        Route::group(['prefix'=>'role/','as' => 'role.'],function(){
            Route::get('list',[RoleController::class,'index'])->name('list')->middleware('permission:role.read');
            Route::get('create',[RoleController::class,'create'])->name('create')->middleware('permission:role.create');
            Route::post('store',[RoleController::class,'store'])->name('store')->middleware('permission:role.create');
            Route::get('edit/{id}',[RoleController::class,'edit'])->name('edit')->middleware('permission:role.read');
            Route::post('update/{id}',[RoleController::class,'update'])->name('update')->middleware('permission:role.update');
            Route::get('status/{id}',[RoleController::class,'status'])->name('status')->middleware('permission:role.status');
            Route::get('delete/{id}',[RoleController::class,'destroy'])->name('delete')->middleware('permission:role.delete');
            
            Route::get('permissions/{id}',[RoleController::class,'permissions'])->name('permissions')->middleware('permission:user.read');
            Route::post('permission/{id}',[RoleController::class,'permissionsStore'])->name('permissionStore')->middleware('permission:user.read');
            
        });

        //Permissions
        Route::group(['prefix'=>'permission/','as' => 'permission.'],function(){
            Route::get('list',[PermissionController::class,'index'])->name('list');
            Route::post('listpost',[PermissionController::class,'getPermission'])->name('postlist');
            // ->middleware('permission:read.role');
            // Route::get('/create',[RoleController::class,'create'])->name('create');
            // // ->middleware('permission:create.role');
            // Route::get('/store',[RoleController::class,'store'])->name('store');
            // // ->middleware('permission:create.role');
            // Route::get('/edit',[RoleController::class,'edit'])->name('edit');
            // // ->middleware('permission:update.role');
            // Route::get('/update',[RoleController::class,'update'])->name('update');
            // // ->middleware('permission:update.role');
            // Route::get('/status/{id}',[RoleController::class,'status'])->name('status');
            // // ->middleware('permission:changestatus.role');
            // Route::get('/delete/{id}',[RoleController::class,'destroy'])->name('delete');
            // // ->middleware('permission:delete.role');
        });

        //Permissions
        Route::group(['prefix'=>'user/','as' => 'user.'],function(){
            Route::get('list',[UserController::class,'index'])->name('list')->middleware('permission:user.read');
            Route::get('create',[UserController::class,'create'])->name('create')->middleware('permission:user.create');
            Route::post('store',[UserController::class,'store'])->name('store')->middleware('permission:user.create');
            Route::get('edit/{id}',[UserController::class,'edit'])->name('edit')->middleware('permission:user.update');
            Route::post('update/{id}',[UserController::class,'update'])->name('update')->middleware('permission:user.update');
            Route::get('status/{id}',[UserController::class,'status'])->name('status')->middleware('permission:user.status');
            Route::get('delete/{id}',[UserController::class,'destroy'])->name('delete')->middleware('permission:user.delete');
        });


    });




});





