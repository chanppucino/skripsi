<?php

use Illuminate\Support\Facades\Route;

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
/*
|
|--------------------------------------------------------------------------
| Routes Admin
|--------------------------------------------------------------------------
|
*/
Route::get('/admin', 'App\Http\Controllers\AdminController@index');
/*
|
|--------------------------------------------------------------------------
| Routes Admin/Announcements/Pengumuman
|--------------------------------------------------------------------------
|
*/
Route::get('/admin/announcements/index', 'App\Http\Controllers\announcementsController@index');
Route::get('/admin/announcements/create', 'App\Http\Controllers\announcementsController@create');
Route::get('/admin/announcements/{id}', 'App\Http\Controllers\announcementsController@show');
Route::get('/admin/announcements/{id}/edit', 'App\Http\Controllers\announcementsController@edit');
Route::get('/admin/announcements/{id}/update', 'App\Http\Controllers\announcementsController@update')->name('announcements.update');
Route::delete('/admin/announcements/{id}', 'App\Http\Controllers\announcementsController@destroy')->name('announcements.destroy');
Route::post('store', 'App\Http\Controllers\announcementsController@store')->name('announcements.store');
/*
|
|--------------------------------------------------------------------------
| Routes Admin/News/Beranda
|--------------------------------------------------------------------------
|
*/
Route::get('/admin/news/index', 'App\Http\Controllers\newsController@index');
/*
|
|--------------------------------------------------------------------------
| Routes Admin/Schedules/JadwalKegiatan
|--------------------------------------------------------------------------
|
*/
Route::get('/admin/schedules/index', 'App\Http\Controllers\schedulesController@index');
Route::get('/admin/schedules/create', 'App\Http\Controllers\schedulesController@create');
Route::post('store', 'App\Http\Controllers\schedulesController@store')->name('schedules.store');

