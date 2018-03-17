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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tutor-dashboard','TutorController@tutorDashboard');
Route::get('/show-week-report-tutor/{id}','TutorController@showWeekReportTutor');


Route::group(['namespace' => 'Admin'], function () {

    Route::get('/payment-history','AdminController@paymentHistory');
    Route::get('/register-tutor','AdminController@registerTutor');
    Route::post('/register-tutor','AdminController@addNewTutor');


    Route::post('/add-new-contact','AdminController@addNewContact');
    Route::post('/add-week','AdminController@addWeek');
    Route::post('/update-week','AdminController@updateWeek');
    Route::get('/edit-week/{id}','AdminController@editWeek');
        Route::get('/show-week-report/{id}','AdminController@showWeekReport');
        Route::get('/dashboard','AdminController@index');
        Route::get('/contact','AdminController@contacts');
        Route::get('/delete-contact/{id}','AdminController@deleteContact');

        Route::group(['prefix' => 'daily-work-entry'], function () {
        Route::get('/add/{id}','DailyWorkController@add');
        Route::get('/edit-daily-work/{id}','DailyWorkController@editDailyWork');
        Route::get('/edit-course/{id}','DailyWorkController@editCourse');
        Route::post('/add','DailyWorkController@createDailyWork');
        Route::post('/update-daily-work','DailyWorkController@updateDailyWork');
        Route::post('/update-course','DailyWorkController@updateCourse');
        Route::get('/show','DailyWorkController@show');
        Route::post('/createCourse','DailyWorkController@createCourse');
        Route::post('/pay-daily-work','DailyWorkController@payDailyWork');
        Route::post('/pay-course','DailyWorkController@payCourse');
        Route::get('/addCourse/{id}','DailyWorkController@addCourse');
        Route::get('/delete/{id}','DailyWorkController@deleteDailyWork');
        Route::get('/delete-course/{id}','DailyWorkController@deleteCourse');
    });

});
