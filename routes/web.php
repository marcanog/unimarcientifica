<?php

use Illuminate\Support\facades\Mail;

Route::get('/', 'GeneralController@index')->name('welcome');
Route::get('/articulos', 'GeneralController@arti')->name('articulos');
Route::get('/seccion/{seccion}', 'ArticlesController@seccion');
Route::get('/art/{slug}', 'GeneralController@show')->name('art');
Route::post('/art/{article}', 'GeneralController@store')->name('art.store');
Route::get('/informacion', 'GeneralController@informacion')->name('informacion');
Route::get('/edicion', 'GeneralController@edicion')->name('edicion');
Route::get('/fulledicion/{id}', 'GeneralController@fulledicion')->name('fulledicion');

Route::get('/autores', 'GeneralController@authors')->name('autores');
Route::get('/lang/{locale}','GeneralController@setlocale');
Route::get('search','GeneralController@search')->name('search');

Auth::routes();

Route::middleware(['auth'])->group(function(){
	Route::post('/comment/{article_id}','CommentsController@store');
	Route::resource('/comment', 'CommentsController', ['only'=> ['store']]);
});

Route::middleware(['auth','auth.admin'])->prefix('admin')->group(function(){
	Route::get('/', 'AdminController@admin')->name('admin');
	Route::get('/comments', 'CommentsController@index')->name('comments');
	Route::get('/comment/{comment}/approved', 'CommentsController@approved')->name('comments.approved');
	Route::resource('/comment', 'CommentsController', ['except'=> ['index','store']]);
	Route::resource('/user', 'AdminUserController', ['except'=> ['show', 'create', 'store']] );
	Route::resource('about', 'AboutsController');
	Route::resource('/article', 'ArticlesController');
	Route::resource('/contact', 'ContactsController');
	Route::resource('/authors', 'AuthorsController');
	Route::resource('/editions', 'EditionsController');

	Route::resource('/information', 'InformationController');
});
