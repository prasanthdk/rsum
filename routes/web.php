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


Auth::routes();

Route::group(['middleware' => 'auth'], function () {


});
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/select_template', 'HomeController@SelectTemplate');
Route::get('/select_resume', 'ResumeController@ChooseTemplate');
Route::get('/personal_info', 'ResumeController@PersonalInfo');
Route::get('/', 'HomeController@index')->name('home');



Route::group(['namespace' => 'Admin', 'prefix' => 'admin','middleware' => 'isAdmin'], function () {

    Route::get('/', 'AdminController@AdminDashboard');

    Route::get('/manage_user', 'ManageUser@ManageUser');
    Route::get('/manage_user_view/{user_id}', 'ManageUser@ManageUserView');

    Route::resource('/manage_resume_template', 'ManageResumeTemplate');
    Route::post('/manage_resume_template/store', 'ManageResumeTemplate@store');
    Route::get('/manage_resume_example', 'ManageResumeExample@ResumeExample');
    Route::get('/payment_subscription', 'ManageSubscription@PaymentSubscription');
    Route::get('/create_resume', 'ManageResume@CreateResume');
    Route::get('/create_edit_template', 'ManageResumeTemplate@CreateTemplate');
});
