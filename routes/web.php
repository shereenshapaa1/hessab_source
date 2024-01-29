<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['namespace' => 'App\\Http\\Controllers\\Website', 'as'=>'website.'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/Real_estate_evaluation', 'RateRequestsController@show')->name('rate-request.show');
    Route::get('/Order_Tracking', 'RateRequestsController@show2')->name('rate-request.step2');
    Route::post('/Order_Tracking', 'RateRequestsController@checknumber')->name('rate-request.checknumber');
    Route::post('/rate-request/update', 'RateRequestsController@update')->name('rate-request.update');
      Route::get('/Instrumental_evaluation', 'RateRequestsControllerMachine@show')->name('rate-request_Machine.show');
    Route::post('/Instrumental_evaluation', 'RateRequestsControllerMachine@store')->name('rate-request_Machine.store');
    Route::post('/rate-request_Machine/update', 'RateRequestsControllerMachine@update')->name('rate-request_Machine.update');
     Route::get('/blog_details/{id}', 'HomeController@blog_details')->name('blog_details');
    Route::get('/blog', 'HomeController@blog')->name('blog');


    

    

    
    Route::post('/rate-request', 'RateRequestsController@store')->name('rate-request.store');
    Route::get('/contactUs', 'HomeController@contactUs')->name('contactUs');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/blog', 'HomeController@blog')->name('blog');
    Route::get('/services', 'HomeController@services')->name('services');
        Route::get('/services/{id}', 'HomeController@services_detail')->name('details');

    Route::get('/pp', 'HomeController@Prviacyploice')->name('Prviacy-ploice');
    Route::post('/contact_store', 'HomeController@contactUs_store')->name('contact_store');
    Route::post('/newsletter', 'HomeController@newsletter')->name('newsletter');

    

    
        

});

Route::get('/commands', function(){
    \Artisan::call('optimize');
   // \Artisan::call('storage:link');
    return \Artisan::call('db:seed --class=MainPermissionsTableDataSeeder --force');
 // return Artisan::call('migrate', ["--force" => true ]);
});
