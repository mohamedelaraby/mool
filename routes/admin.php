<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "[ Admin ]" middleware group. Now create something great!
|
*/
Route::get('lang/{lang}', function ($lang) {
    session()->has('lang')? session()->forget('lang') : ' ';
    $lang = in_array($lang, ['ar','en']) ?  session()->put('lang', $lang):session()->put('lang', '');
    return back();
});
// Route::group(
//     [
//         'prefix' => LaravelLocalization::setLocale(),
//         'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ],
//     ], function(){


Route::group(['middleware'=>'Lang'],function(){
        Route::group(['prefix' => 'admin','namespace' => 'Manage\Admin' , ], function () {

  //  Lang routes

            // Config admin auth
            // Config::set('auth.defines', 'admin');

            /**
             *  Admin Auth routes
            */
            Route::get('login', 'AdminAuthController@login');
            Route::post('login', 'AdminAuthController@dologin');
            Route::get('forgot/password', 'AdminAuthController@forgot_password');
            Route::post('forgot/password', 'AdminAuthController@forgot_password_post');
            Route::get('reset/password/{token}', 'AdminAuthController@reset_password');
            Route::post('reset/password/{token}', 'AdminAuthController@reset_password_post');

            // Admin Middleware and guatd
            // Route::group(['middleware' => 'admin:admin'], function () {

            // Admin dashboard
            Route::get('/', function () {
                return view('admin.home');
            });

            // Admin datatable routes
            Route::resource('admin', 'AdminController');
            Route::delete('delete_all', 'AdminController@multi_delete');

            // User datatable routes
            Route::resource('users', 'Users\UserController');
            Route::delete('users/delete_all', 'Users\UserController@multi_delete');

            // Settings
            Route::get('settings', 'SettingsController@settings');
            Route::post('settings', 'SettingsController@settings_save');


















            // Route::any('logout', 'AdminAuthController@logout');});
        });
    });