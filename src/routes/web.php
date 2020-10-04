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

//ルートディクトリにアクセス時、フォルダ一覧画面へリダイレクト
Route::get('/', function () {
    return redirect('/folders');
});
Route::get('/folders', 'FolderController@index')->name('folders.index');
Route::get('/folders/create', 'FolderController@showCreateForm')->name('folders.create');
Route::post('/folders/create', 'FolderController@create');

Route::get('/folders/{id}/tasks', 'TaskController@index')->name('tasks.index');
Route::get('/folders/{id}/tasks/create', 'TaskController@showCreateForm')->name('tasks.create');
Route::post('/folders/{id}/tasks/create', 'TaskController@create');
Route::get('/folders/{id}/tasks/{task_id}/edit', 'TaskController@showEditForm')->name('tasks.edit');
Route::post('/folders/{id}/tasks/{task_id}/edit', 'TaskController@edit');
Route::post('/folders/{id}/tasks/{task_id}/edit', 'TaskController@edit');
Route::delete('/folders/{id}/tasks/{task_id}/delete', 'TaskController@delete')->name('tasks.delete');