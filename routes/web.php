<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementsController;

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
Route::get('admin/announcements/index', [announcementsController::class, 'index']);
Route::get('admin/announcements/create', [announcementsController::class, 'create']);
Route::get('admin/announcements/{id}', [announcementsController::class, 'show']);
Route::get('admin/announcements/{id}/edit', [announcementsController::class, 'edit']);
Route::get('admin/announcements/{id}/update', [announcementsController::class, 'update'])->name('announcements.update');
Route::delete('admin/announcements/{id}', [announcementsController::class, 'destroy'])->name('announcements.destroy');
Route::post('admin/store', [AnnouncementsController::class, 'store'])->name('announcements.store');
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
