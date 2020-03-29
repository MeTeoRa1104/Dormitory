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
    return view('main');
});

Route::get('/home', function () {
    return view('main');
});



Route::get('/rooms','RoomController@index');

Route::post('/searchroom','RoomController@searchroom');

Route::get('/searchroom', function () {
    return view('noPermission');
});

Route::post('/aboutroom','RoomController@aboutroom');

Route::get('/aboutroom', function () {
    return view('noPermission');
});

Route::get('/students','StudentController@index');

Route::post('/searchstudent','StudentController@searchstudent');

Route::get('/searchstudent', function () {
    return view('noPermission');
});

Route::post('/aboutstudent','StudentController@aboutstudent');

Route::get('/aboutstudent', function () {
    return view('noPermission');
});

Route::get('/studentsByFaculties','StudentController@studentsByFaculties');

Route::get('/requests','StudentController@studentrequests');

Route::post('/declaimstudent','StudentController@declaimstudent');

Route::get('/declaimstudent', function () {
    return view('noPermission');
});

Route::post('/acceptStudent','StudentController@acceptStudent');

Route::get('/acceptStudent', function () {
    return view('noPermission');
});

Route::get('/aboutuser','StudentController@aboutuser');

Route::get('/studentrequest', function () {
    return view('studentrequest');
});

Route::post('/makestudentrequest','StudentController@makestudentrequest');

Route::get('/makestudentrequest', function () {
    return view('noPermission');
});

Route::get('/invoices','StudentsController@invoices');

Route::get('/makeinvoice', function () {
    return view('makeinvoice');
});

Route::post('/domakeinvoice','StudentController@domakeinvoices');

Route::get('/invoices','StudentController@viewinvoices');

Route::get('/viewstudentrequest','RequestController@viewstudentrequest');

Auth::routes();






