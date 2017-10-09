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
Route::any('/', function () {
    //
});
Route::get('home', 'HomeController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('task/{task}/add', 'TaskItemController@index');
Route::get('task/{task}/add/{item}', 'TaskItemController@attach');
Route::delete('task/{task}/del/{item}', 'TaskItemController@detach');
Route::resource('task.item','ItemController');
Route::resource('item','ItemController');

Route::get('task/{task}/assigntask','AssignTaskController@index');
Route::get('task/{task}/assigntask/create','AssignTaskController@create');
Route::post('task/{task}/assigntask/store','AssignTaskController@store');
Route::get('assigntask/{assignTask}/edit','AssignTaskController@edit');
Route::PATCH('assigntask/{assignTask}/update','AssignTaskController@update');
Route::DELETE('assigntask/{assignTask}/destroy','AssignTaskController@destroy');

Route::get('assigntask/{assignTask}/add', 'AssignTaskGroupController@index');
Route::get('assigntask/{assignTask}/add/{group}', 'AssignTaskGroupController@attach');
Route::delete('assigntask/{assignTask}/del/{group}', 'AssignTaskGroupController@detach');


Route::get('rule','RuleItemController@index');
Route::get('item/{item}/rule','RuleItemController@index');
Route::get('item/{item}/rule/create','RuleItemController@create');
Route::get('rule/{rule}','RuleItemController@show');
Route::post('item/{item}/rule/store/','RuleItemController@store');
Route::get('rule/{rule}/edit','RuleItemController@edit');
Route::PATCH('rule/{rule}/update','RuleItemController@update');
Route::DELETE('rule/{rule}/destroy','RuleItemController@destroy');

Route::get('item/{item}/answer/create','AnswerController@create');
Route::post('item/{item}/answer/store','AnswerController@store');
Route::get('answer/{answer}/edit','AnswerController@edit');
Route::PATCH('answer/{answer}/update','AnswerController@update');
Route::DELETE('answer/{answer}/destroy','AnswerController@destroy');
Route::post('item/{item}/answer/store','AnswerController@store');
//Route::get('answer/{answer}/edit','AnswerController@edit');
//Route::PATCH('answer/{answer}/update','AnswerController@update');
//Route::DELETE('answer/{answer}/destroy','AnswerController@destroy');


//Route::resource('clain.task','TaskController');
Route::resource('task','TaskController');
Route::resource('user','UserController');
Route::resource('group','GroupController');
Route::get('group/{group}/add', 'GroupAssignController@index');
Route::get('group/{group}/add/{user}', 'GroupAssignController@attach');
Route::get('group/{group}/del/{user}', 'GroupAssignController@detach');

//Route::resource('assigntask', 'AssignTaskController');





//Route::resource('products','ProductController');
//Route::resource('question','QuestionController');
//Route::resource('activity','ActivityController');
//Route::get('/activity/question','ActivityController@index');
//Route::resource('question','QuestionController');
//Route::resource('activity.question','ActQstController');
//Route::resource('activity/{activity}/question/','ActQstController');
//Route::get('{id}/question','ActQstController@index','3');
/*
Route::get('questionsfrom',function(){
        $questions = json_encode(DB::table('questions')->get()->toArray());//
        return $questions;//compact('questions');//view('questions.index', compact('questions'));
        //return App/Question::all()->toArray();
});
Route::get('/t', function () {
    return [1, 2, 3];
});
*/
/*

Route::get('user/{a}/{b}', function ($id,$id2) {
    return view('show');
})->where('a', '[A-Za-z]+');;
Route::get('/greeting', function () {
    return view('greeting', ['name' => 'James']);
});
Route::get('/greeting/{name}', function ($name) {
    return view('greeting', ['name' => $name]);
});
Route::get('/email/{email}', function ($email) {
	DB::table('users')->insert(['email' => $email, 'name' => '','password'=>hash('sha256',$email)]);
    return view('greeting', ['name' => $email]);
});
Route::get('/showemail/{email}', function ($email) {
	DB::table('users')->insert(['email' => $email, 'name' => '','password'=>hash('sha256',$email)]);
    return view('greeting', ['name' => $email]);
});
*/

//Route::get('/home', 'HomeController@index')->name('home');
