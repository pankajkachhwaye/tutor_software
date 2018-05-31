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

Route::get('/test',function (){

    Mail::to('pankajkachhwaye@gmail.com')->send(new \App\Mail\TestMail());
    if (Mail::failures()) {
   dd(Mail::failures());
    }

    // otherwise everything is okay ...
   dd(Mail::failures());
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tutor-dashboard','TutorController@tutorDashboard');
Route::get('/tutor-all-semester','TutorController@tutorAllSemester');
Route::get('/show-week-report-tutor/{id}','TutorController@showWeekReportTutor');
Route::get('/show-tutor-dashboard/{semester_id}','TutorController@showTutorDashboard');


Route::group(['namespace' => 'Admin'], function () {

    Route::get('/payment-history','AdminController@paymentHistory');
    Route::get('/register-tutor','AdminController@registerTutor');
    Route::post('/register-tutor','AdminController@addNewTutor');


    Route::get('/all-semesters','AdminController@allSemesters');
    Route::post('/change-admin-credentials','AdminController@changeCdminCredentials');
    Route::get('/show-semester-data/{semester_id}','AdminController@showSemesterData');
    Route::post('/add-new-semester','AdminController@addNewSemester');
    Route::post('/add-new-contact','AdminController@addNewContact');
    Route::post('/add-week','AdminController@addWeek');
    Route::post('/update-week','AdminController@updateWeek');

    Route::get('/edit-week/{id}','AdminController@editWeek');
        Route::get('/show-week-report/{id}','AdminController@showWeekReport');
        Route::get('/dashboard','AdminController@index');
//        Route::get('/contact','AdminController@contacts');
        Route::get('/delete-contact/{id}','AdminController@deleteContact');


    // Branch
    Route::post('/add-new-branch','AdminController@addNewBranch');
    Route::post('/add-new-subject','AdminController@addNewSubject');
    Route::get('/show-subjects/{id}','AdminController@showSubjects');
    Route::get('/edit-branch/{id}','AdminController@editBranch');
    Route::post('/update-branch','AdminController@updateBranch');
    Route::get('/edit-subject/{id}','AdminController@editSubject');
    Route::post('/update-subject','AdminController@updateSubject');

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
