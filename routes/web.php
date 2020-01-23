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

// Route::get('/',[
// 	'uses' => 'GlavController@getIndex',
// 	'as' => 'glav.index'
// ]);

Route::match(['get'],'/',[
	'uses' => 'GlavController@getPost',
	'as' => 'glav.get_post'
]);

Route::match(['post'],'/add',[
	'uses' => 'GlavController@addPost',
	'as' => 'glav.ad_post'
]);

Route::get('/hashtag/{hashtag_id}',[
	'uses' => 'getHashtagController@getIndex',
	'as'=> 'glav.get_hashtag'
	]);
Route::match(['post','get'],'/like/{id}',[
	'uses' => 'LikeController@addLike',
	'as'=> 'glav.add_like'
	]);

Route::match(['get','post'],'/report/{id}',[
	'uses' => 'ReportController@report',
	'as'=> 'glav.report'
	]);

// Route::match(['post','get'],'/read_more/{id}',[
// 	'uses' => 'ReadMoreController@index',
// 	'as'=> 'glav.read_more'
// 	]);

Route::match(['post'],'/comments/{id}',[
	'uses' => 'CommentsController@store',
	'as'=> 'comments.store'
	]);

Route::match(['get','post'],'/solved',[
	'uses' => 'SolvedController@index',
	'as'=> 'glav.active'
	]);



Route::match(['get','post'],'/admin',[
	'uses'=>'AdminController@getIndex',
	'as'=>'admin.index'
])->middleware('auth');;

Route::group(['middleware' => 'admin'], function () {
    
Route::post('/admin/checkLogin', ['uses'=>'AdminController@store','as'=>'user.checkLogin']);

Route::match(['get','post'],'/admin/logout',['uses'=>'AdminController@logout','as'=>'user.logout']);
Route::match(['get','post'],'/admin/delete/{id}',['uses'=>'AdminController@delete','as'=>'admin.delete']);
Route::match(['get','post'],'/admin/solve/{id}',['uses'=>'AdminController@solve','as'=>'admin.solve']);
Route::match(['get','post'],'/admin/partialSolve/{id}',['uses'=>'AdminController@partialSolve','as'=>'admin.partialSolve']);
Route::match(['get','post'],'/admin/post/{id}',['uses'=>'AdminController@post','as'=>'admin.post']);
Route::match(['get'],'/admin/edit/{id}',['uses'=>'EditController@index','as'=>'admin.indexEdit']);
Route::match(['post'],'/admin/edit/{id}',['uses'=>'EditController@edit','as'=>'admin.edit']);
});
Route::post('/chirps/{id}/act', 'HomeController@actOnChirp');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
