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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * @OA\Get(
 *     path="/",
 *     description="Home page",
 *     @OA\Response(response="default", description="Welcome page")
 * )
 */
Route::get('/categories', 'ApiAdminController@Categories')->name('api_admin');

Route::get('/products', 'ApiAdminController@Products')->name('api_admin');

Route::get('/brands', 'ApiAdminController@Brands')->name('api_admin');

Route::get('/coupons', 'ApiAdminController@Coupons_list')->name('api_admin');



