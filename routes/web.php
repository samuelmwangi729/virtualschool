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
Route::get('/fileQuestion',[
    'uses'=>'QuestionsController@file',
    'as'=>'files.file'
]);
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
Route::get('/Marked/Sheets', 'FilesController@marked')->name('files.marked');
Route::get('/Files/Upload', 'FilesController@create')->name('files.upload');
Route::post('/Files/Store', 'FilesController@store')->name('files.store');
Route::post('/Files/Store/Single', 'FilesController@sstore')->name('marked.sstore');
Route::post('/Files/Quiz', 'FilesController@file')->name('files.file');
Route::post('/Topics/Store', 'TopicsController@store')->name('topics.store');
Route::get('/Students/Add', 'StudentsController@create')->name('students.add');
Route::post('/Students/Store', 'StudentsController@store')->name('students.store');
Route::get('/Students/All', 'StudentsController@index')->name('students.all');
Route::get('/Students/Print', 'StudentsController@print')->name('students.print');
Route::get('/Students/MarkSheet', 'ResultsController@index')->name('students.marksheet');
Route::get('/Students/Results/Post', 'ResultsController@create')->name('marks.post');
Route::get('/Answers/Bulk/Upload', 'ResultsController@bulk')->name('bulk.post');
Route::post('/Answers/Bulk/Store', 'ResultsController@store')->name('bulk.store');
Route::post('/Answers/Marked/Store', 'ResultsController@mstore')->name('marked.store');
Route::get('/Questions/Select/', 'QuestionsController@view')->name('questions.print');
Route::post('/Questions/View/', 'QuestionsController@print')->name('questions.select');
Route::post('/Questions/File/Store/', 'QuestionsController@fstore')->name('questionfile.store');
Route::get('/FileQuestion', 'QuestionsController@file')->name('questions.file');
Route::get('/Questions/Files', 'QuestionsController@qfiles')->name('files.questions');
Route::get('/Answersheet/Fill', 'QuestionsController@answersheet')->name('answersheet.print');
Route::get('/Markedsheet/Post', 'ResultsController@marked')->name('marked.post');
Route::get('/Markedsheet/Post/Single', 'ResultsController@smarked')->name('marked.single');
Route::post('/Answersheet/Print', 'QuestionsController@answers')->name('answers.print');