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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

//Profile completion
Route::middleware(['auth'])->group(function () {
    
    Route::get('dashboard/profile/settings', 'Dashboard\Account\UserController@completeProfile')
        ->name('dashboard.account.profile');

});

//Route::group(['middleware' => ['auth', 'user.profile']], function() {
    Route::middleware(['auth', 'user.profile'])->group(function () {

        Route::get('/home', 'HomeController@index')->name('home');

        Route::prefix('dashboard')->group(function () {

            Route::namespace('Dashboard')->group(function () {

                //monitoring
                Route::prefix('monitoring')->group(function () {
                    Route::get('uptime/websites', [
                        'uses' => 'Monitoring\Uptime\WebsitesController@index',
                        'as' => 'uptime.websites'
                    ]);
                });

                //reports

                //general

            });

        });

    });
//});
