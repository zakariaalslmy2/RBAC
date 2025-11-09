<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\RoleController;
use App\Http\Controllers\api\v1\UserController;
use App\Http\Controllers\api\v1\AuthentcationController;



// authentcation

    Route::post('/login',[AuthentcationController::class,'login']);
    Route::post('/register',[AuthentcationController::class,'register']);

    Route::middleware('auth:sanctum')->group(function () {
        // profile routes

        Route::post('/logout', [authentcationController::class, 'logout']);
        Route::get('/me', [authentcationController::class, 'me']);

        // user manugment routes
        route::controller(UserController::class)->group(function (){
             Route::get('/users',  'index');
             Route::get('/users/{user}',  'show');
             Route::post('/users',  'store');
             Route::put('/users/{user}',  'update');
             Route::delete('/users/{user}',  'delete');

        });


                // Role manugment routes
        route::controller(RoleController::class)->group(function (){
             Route::get('/Roles',  'index');
             Route::get('/Roles/{Role}',  'show');
             Route::post('/Roles',  'store');
             Route::put('/Roles/{Role}',  'update');
             Route::delete('/Roles/{Role}',  'delete');

        });
    });
