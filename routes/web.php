<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/login', function () {
//     return view('login');
// });
Route::redirect('/','/mywallet-master/public/login');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
//route group userinformation
Route::group(['prefix' => 'userinfo'],function(){
    Route::get('/edit','Auth\UserInfoController@info') -> name('edit');
    //route change password form
    Route::get('/edit_password','Auth\UserInfoController@info')->name('password');
    Route::post('/edit_password','Auth\UserInfoController@change_password')->name('password');
    //route change avatar form
    Route::get('/edit_avatar','Auth\UserInfoController@info')->name('avatar');
    Route::post('/edit_avatar','Auth\UserInfoController@change_avatar')->name('avatar');
});
// Route::post('/userinfo','Auth\UserInfoController@change_password');
//route for socialite login
Route::get('/auth/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('/auth/{provide}/callback', 'SocialAuthController@handleProviderCallback');
