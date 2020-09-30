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
//順番に規則性があるっぽい
Route::get('/folders', 'FolderController@index')->name('folders.index');
Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
Route::post('/folders/create', 'FolderController@create');
Route::get('/folders/{folder_id}', 'TaskController@index')->name('tasks.index');