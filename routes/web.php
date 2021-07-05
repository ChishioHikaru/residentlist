<?php

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

Route::get('/', 'ResidentsController@index');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');


// Twitter用ログイン
Route::get('login/twitter', 'Auth\LoginController@redirectToTwitterProvider')->name('login.twitter');
// TwitterコールバックURL
Route::get('login/twitter/callback', 'Auth\LoginController@handleTwitterProviderCallback');


Route::group(['middleware' => ['auth']], function () {
    
    // 滞納者一覧ページ
    Route::get('delinquents', 'ResidentsController@delinquents')->name('residents.delinquents');
    
    // 入居者関係のルーティング
    Route::resource('residents', 'ResidentsController');
    
    Route::group(['prefix' => 'residents/{id}'], function () {
        // 入居者から滞納者にステータスを変更するルーティング
        Route::post('delinquent', 'ResidentsController@delinquent')->name('residents.delinquent');
        // 滞納者から入居者にステータスを戻すルーティング
        Route::delete('undelinquent', 'ResidentsController@undelinquent')->name('residents.undelinquent');
    });
   
});