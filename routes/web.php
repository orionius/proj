<?php

use Illuminate\Support\Facades\Route;
use App\ConferenceModel;
use App\CommentModel;


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
    return view('home');
});






 Route::get('/confer_list', 'ConferListController@confer_list')->name('confer_list');
 Route::post('/confer_edit', 'ConferListController@confer_submit')->name('confer_submit');
 Route::post('/confer_edit/comment', 'ConferListController@coment_submit')->name('coment_submit');
 Route::get('/admin', 'ConferListController@confer_admin')->name('confer_admin');

 Route::post('/admin', 'ConferListController@admin_download')->name('admin_download');
 Route::post('/admin/delallow', 'ConferListController@admin_commentdelallow')->name('admin_commentdelallow');



 Route::post('/admin/add', 'ConferListController@admin_delconfer')->name('admin_delconfer');



 

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
