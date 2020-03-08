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
})->name('index');
Auth::routes();
Route::get('/Institution/Register', 'RegisterController@index')->name('institution');
Route::get('/Subjects/Manage', 'SubjectsController@index')->name('subject.home');
Route::get('/Classes/Manage', 'ClassesController@index')->name('classes.home');
Route::get('/Classes/Home', 'ClassesController@all')->name('classes.all');
Route::get('/Subjects/Index', 'SubjectsController@all')->name('subject.all');
Route::get('/Subjects/Add', 'SubjectsController@create')->name('subject.create');
Route::get('/Classes/Add', 'ClassesController@create')->name('classes.create');
Route::get('/Questions/Add', 'QuestionsController@create')->name('questions.create');
Route::get('/Questions/Manage', 'QuestionsController@index')->name('questions.index');
Route::get('/Questions/All', 'QuestionsController@all')->name('questions.home');
Route::post('/Questions/Store', 'QuestionsController@store')->name('questions.store');
Route::post('/Subjects/Store', 'SubjectsController@store')->name('subject.store');
Route::post('/Classes/Store', 'ClassesController@store')->name('class.store');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Topics/Add', 'TopicsController@create')->name('topics.create');
Route::get('/Topics/Manage', 'TopicsController@index')->name('topics.home');
Route::get('/Topics/All', 'TopicsController@all')->name('topics.all');
Route::get('/Files/All', 'FilesController@index')->name('files.all');
Route::get('/Files/Home', 'FilesController@all')->name('files.view');
Route::get('/Files/Upload', 'FilesController@create')->name('files.upload');
Route::post('/Files/Store', 'FilesController@store')->name('files.store');
Route::post('/Topics/Store', 'TopicsController@store')->name('topics.store');
Route::get('/Students/Add', 'StudentsController@create')->name('students.add');
Route::post('/Students/Store', 'StudentsController@store')->name('students.store');
Route::get('/Students/All', 'StudentsController@index')->name('students.all');
Route::get('/Students/Print', 'StudentsController@print')->name('students.print');