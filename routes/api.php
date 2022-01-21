<?php

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

// registraciis linki
Route::post('/signup', [AuthenticationController::class, 'createAccount']);

// loginis linki
Route::post('/signin', [AuthenticationController::class, 'signin']);

//group daloginebuli eqauntebistvis wvdomadi routebi
Route::group(['middleware' => ['auth:sanctum']], function () {

    //profile page route
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    //
    Route::post('/sign-out', [AuthenticationController::class, 'logout']);
});

