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

Auth::routes(); //Authetication Package

Route::get('/', function () { //Front page
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home'); // Home page


Route::group(['middleware' => ['auth']], function() {


    Route::get('changepassword', function() {
        $user = App\User::where('email',
        'doctor1@homeopathy.com')->first();
        $user->password = Hash::make('doctor1@homeopathy.com');
        $user->save();

        echo 'Password changed successfully.';
    });


    Route::resource('roles','RoleController'); //spatie package
    Route::resource('users','UserController');  //auth package

    
    Route::resource('hospitals','HospitalController');
    Route::resource('departments', 'DepartmentController');

    Route::resource('questions', 'QuestionsubmissionController');
    Route::resource('answers'  , 'AnswerController');

    Route::get('user/{id}/relations', 'RelationsController');

    Route::get('users/{id}/contacts', 'ContactsController@contacts');

    Route::get('/user-logout', function(){
       Auth::logout();
       return Redirect::to('login');
    });


    //Clear Cache facade value:
    Route::get('/clear-cache', function() {
          $exitCode = Artisan::call('cache:clear');
          $previous_request = url()->previous();
          return redirect($previous_request);
    });


    //Clear View cache:
    Route::get('/view-clear', function() {
        $exitCode = Artisan::call('view:clear');//return '<h1>View cache cleared</h1>';
        $previous_request = url()->previous();
        return redirect($previous_request);
    });


    //Reoptimized class loader:
    Route::get('/optimize', function() {
        $exitCode = Artisan::call('optimize');//return '<h1>Reoptimized class loader</h1>';
        $previous_request = url()->previous();
        return redirect($previous_request);
    });

    //Route cache:
    Route::get('/route-cache', function() {
        $exitCode = Artisan::call('route:cache');//return '<h1>Routes cached</h1>';
        $previous_request = url()->previous();
        return redirect($previous_request);
    });



    //Clear Route cache:
    Route::get('/route-clear', function() {
        $exitCode = Artisan::call('route:clear');//return '<h1>Route cache cleared</h1>';
        $previous_request = url()->previous();
        return redirect($previous_request);
    });



    //Clear Config cache:
    Route::get('/config-cache', function() {
        $exitCode = Artisan::call('config:cache');//return '<h1>Clear Config cleared</h1>';
        $previous_request = url()->previous();
        return redirect($previous_request);
    });



});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
