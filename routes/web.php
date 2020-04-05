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
Route::get('/Subjects/edit/{id}', 'SubjectsController@edit')->name('subject.edit');
Route::get('/Subjects/destroy/{id}', 'SubjectsController@destroy')->name('subject.delete');
Route::get('/Classes/Manage', 'ClassesController@index')->name('classes.home');
Route::get('/Classes/Home', 'ClassesController@all')->name('classes.all');
Route::get('/Classes/Edit/{id}', 'ClassesController@edit')->name('classes.edit');
Route::post('/Classes/update/{id}', 'ClassesController@update')->name('class.update');
Route::get('/Classes/Delete/{id}', 'ClassesController@destroy')->name('classes.delete');
Route::get('/Subjects/Index', 'SubjectsController@all')->name('subject.all');
Route::get('/Subjects/Add', 'SubjectsController@create')->name('subject.create');
Route::post('/Subjects/Update/{id}', 'SubjectsController@update')->name('subject.update');
Route::get('/Classes/Add', 'ClassesController@create')->name('classes.create');
Route::get('/Questions/Add', 'QuestionsController@create')->name('questions.create');
Route::get('/Questions/Edit/{id}', 'QuestionsController@edit')->name('questions.edit');
Route::get('/FQuestions/Edit/{id}', 'QuestionsController@fedit')->name('fquestions.edit');
Route::get('/Questions/Delete/{id}', 'QuestionsController@destroy')->name('questions.delete');
Route::get('/FQuestions/Delete/{id}', 'QuestionsController@fdestroy')->name('fquestions.delete');
Route::post('/Questions/Update/{id}', 'QuestionsController@update')->name('questions.update');
Route::get('/Questions/Manage', 'QuestionsController@index')->name('questions.index');
Route::get('/Questions/All', 'QuestionsController@all')->name('questions.home');
Route::post('/Questions/Filter', 'QuestionsController@filter')->name('questions.filter');
Route::post('/Questions/Store', 'QuestionsController@store')->name('questions.store');
Route::post('/FileQuestions/Store/{id}', 'QuestionsController@fupdate')->name('fquestionfile.store');
Route::post('/Subjects/Store', 'SubjectsController@store')->name('subject.store');
Route::post('/Classes/Store', 'ClassesController@store')->name('class.store');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Topics/Add', 'TopicsController@create')->name('topics.create');
Route::get('/Topics/Manage', 'TopicsController@index')->name('topics.home');
Route::get('/Topics/All', 'TopicsController@all')->name('topics.all');
Route::get('/Topics/Edit/{id}', 'TopicsController@edit')->name('topic.edit');
Route::post('/Topics/Update/{id}', 'TopicsController@update')->name('topics.update');
Route::get('/Topics/Delete/{id}', 'TopicsController@destroy')->name('topic.delete');
Route::get('/Files/All', 'FilesController@index')->name('files.all');
Route::get('/Files/Home', 'FilesController@all')->name('files.view');
Route::get('/Marked/Sheets', 'FilesController@marked')->name('files.marked');
Route::get('/Files/Upload', 'FilesController@create')->name('files.upload');
Route::post('/Files/Store', 'FilesController@store')->name('files.store');
Route::post('/Files/Store/Single', 'FilesController@sstore')->name('marked.sstore');
Route::post('/Files/Quiz', 'FilesController@file')->name('files.file');
Route::post('/Topics/Store', 'TopicsController@store')->name('topics.store');
Route::get('/Students/Add', 'StudentsController@create')->name('students.add');
Route::get('/Students/View/{uid}', 'StudentsController@show')->name('student.view');
Route::get('/Students/edit/{uid}', 'StudentsController@edit')->name('student.edit');
Route::get('/Students/delete/{uid}', 'StudentsController@destroy')->name('student.delete');
Route::post('/Students/Store', 'StudentsController@store')->name('students.store');
Route::post('/Students/Update/{uid}', 'StudentsController@update')->name('students.update');
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
Route::post('/FileQuestion/Filter', 'QuestionsController@ffile')->name('fquestions.filter');
Route::get('/Questions/Files', 'QuestionsController@qfiles')->name('files.questions');
Route::get('/Answersheet/Fill', 'QuestionsController@answersheet')->name('answersheet.print');
Route::get('/Markedsheet/Post', 'ResultsController@marked')->name('marked.post');
Route::get('/Markedsheet/Post/Single', 'ResultsController@smarked')->name('marked.single');
Route::get('/Account/Status', 'AccountsController@index')->name('account');
Route::post('/Account/Update', 'AccountsController@update')->name('account.update');
Route::post('/Answersheet/Print', 'QuestionsController@answers')->name('answers.print');
Route::get('/Prices/Add', 'PriceController@index')->name('prices.all');
Route::get('/Users/Index', 'UsersController@index')->name('users.index');
Route::get('/Users/Suspend/{uid}', 'UsersController@suspend')->name('user.suspend');
Route::get('/Users/Restore/{uid}', 'UsersController@destroy')->name('user.restore');
Route::post('/Prices/Store', 'PriceController@store')->name('prices.store');
Route::get('/Prices/View', 'PriceController@show')->name('prices.view');
Route::get('/Prices/Edit/{id}', 'PriceController@edit')->name('price.edit');
Route::post('/Prices/Update', 'PriceController@update')->name('prices.update');
Route::get('/Payments/Index', 'PaymentsController@index')->name('payments.index');
Route::post('/Payments/Store', 'PaymentsController@store')->name('payments.store');
Route::get('/Payments/Home/All', 'PaymentsController@showAll')->name('payments.all');
Route::get('/Payments/Print', 'PaymentsController@Print')->name('payments.print');
Route::post('/Subscriber/Add', 'SubscribersController@store')->name('subscribe');
Route::get('/TimeTable/View', 'TimeTableController@index')->name('timetable');
Route::post('/CurrentWeek/Add', 'SettingsController@store')->name('settings.currentWeek');
Route::post('/TimeTable/Add', 'TimeTableController@store')->name('timetable.post');
Route::get('/Complaints/Add', 'ComplaintsController@index')->name('complaints.index');
Route::post('/Complaints/Post', 'ComplaintsController@store')->name('complaint.post');
Route::get('Payment/Test', 'TestController@index');