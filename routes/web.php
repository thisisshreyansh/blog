<?php
use App\Http\Controllers\SharedWithController;
use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadFileController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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

Route::get('/', [AlbumController::class, 'index'])->name('home');
Route::get('/albums/owned', [AlbumController::class, 'myalbums'])->name('myalbums');
Route::get('/albums/shared', [AlbumController::class, 'sharedalbums'])->name('sharedalbums');
Route::get('/albums/{album:id}', [AlbumController::class, 'show'])->name('showalbum');
 
Route::get('album/{id}/download', [DownloadFileController::class, 'downloadFile'])->name('downloadFile');
Route::get('album/image/{id}/download', [DownloadFileController::class, 'downloadAlbum'])->name('downloadAlbum');

Route::post('create/album', [AlbumController::class, 'store'])->middleware('admin')->name('createalbum');
Route::patch('update/album/{album:id}', [AlbumController::class, 'update'])->middleware('admin');
Route::delete('delete/album/{album:id}', [AlbumController::class, 'destroy'])->middleware('admin')->name('deletealbum');


Route::post('add/album/{album:id}/image', [ImageController::class, 'store'])->middleware('admin')->name('storeimage');
Route::delete('album/image/{image:album_id}', [ImageController::class, 'destroy'])->middleware('admin')->name('destoryimage');


Route::post('albums/sharing/{album:id}', [SharedWithController::class, 'store'])->middleware('admin')->name('album.sharing');
Route::get('albums/sharing-list/{album:id}', [SharedWithController::class, 'index'])->middleware('admin')->name('sharing.list');
Route::delete('removesharing/{user:id}', [SharedWithController::class, 'destroy'])->middleware('admin')->name('revoke.sharing');

//verification for auth routes
Auth::routes(['verify' => true]);

//forget pass
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::get('/searchAlbum', [AlbumController::class, 'searchAlbum'])->name('searchAlbum');
Route::get('/searchImage', [ImageController::class, 'searchImage'])->name('searchImage');