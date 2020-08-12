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
});
//tạo bảng

Route::get('index',['as'=>'trang-chu','uses'=>'PageController@getIndex']);
Route::get('loai-sp/{loai}',
	['as'=>'loai-sp',
	'uses'=>'PageController@getloaisp']);

Route::get('san-pham/{masp}',
	['as'=>'san-pham', 'uses'=>'PageController@getsanpham']);

Route::get('lien-he',['as'=>'lien-he', 'uses'=>'PageController@getlienhe']);

Route::get('gioi-thieu',['as'=>'gioi-thieu', 'uses'=>'PageController@getgioithieu']);

Route::get('dang-nhap',['as'=>'dang-nhap','uses'=>'Auth\LoginController@getLogin']);
Route::post('dang-nhap',['as'=>'dang-nhap','uses'=>'Auth\LoginController@postLogin']);
Route::get('dang-ki',['as'=>'dang-ki','uses'=>'Auth\LoginController@getsignup']);
Route::post('dang-ki',['as'=>'dang-ki','uses'=>'Auth\LoginController@postsignup']);

Route::get('admin', function () {
    return view('admin.index_admin');
});
// Route::get('admin', function () {
//     return view('admin.header_admin');
// });


