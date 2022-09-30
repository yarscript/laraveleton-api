<?php

use Illuminate\Support\Facades\Route;

use Yarscript\Dashboard\Http\Controllers\HomeController;
use Yarscript\User\Http\Controllers\{
    SessionController,
    RegistrationController
};
use Yarscript\Api\Http\Controllers\{
    User\AuthController
};

/*
 * Dashboard routes
 */
Route::get('/', [HomeController::class, 'index'])->name('dashboard.home.index');

//Login routes
//Lofin from show
Route::get('/login', [SessionController::class, 'show'])->defaults('_config', [
    'view' => 'dashboard::auth.login'
])->name('user.session.index');

// Login form store
//Route::post('/login', [SessionController::class, 'create'])->defaults('_config', [
//    'redirect' => 'customer.profile.index'
//])->name('user.session.create');

// Registration Routes
//registration form show
Route::get('/register', [RegistrationController::class, 'show'])->defaults('_config', [
    'view' => 'dashboard::auth.register'
])->name('user.register.index');

//registration form store
//Route::post('/register', [RegistrationController::class, 'create'])->defaults('_config', [
//    'redirect' => 'dashboard.home.index',
//])->name('user.register.create');

//Route::group();
//Route::prefix();

//Route::group(
//    ['prefix' => 'api', 'name' => 'api.'],
//    function () {
//
//        Route::group(
//            [
//                'namespace' => 'Yarscript\Api\Http\Controllers\User',
//                'prefix' => 'user',
//                'name' => 'user.'
//            ],
//            function () {
//
//                //Login routes
//                Route::post('/login', [AuthController::class, 'login'])->defaults('_config', [
//                    'redirect' => 'dashboard.home.index'
//                ]);
//
//                // Registration Routes
//                Route::post('/register', [AuthController::class, 'register'])->defaults('_config', [
//                    'redirect' => 'dashboard.home.index',
//                ]);
//            });
//    });
