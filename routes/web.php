<?php
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SharedWithController;
use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadFileController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Mail\NewUserNotification;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
Route::get('/myalbums', [AlbumController::class, 'myalbums'])->name('myalbums');
Route::get('/sharedalbums', [AlbumController::class, 'sharedalbums'])->name('sharedalbums');
Route::get('posts/{album:id}', [AlbumController::class, 'show']);
 
Route::get('download/{file_name}', [DownloadFileController::class, 'downloadFile'])->name('downloadFile');
Route::get('get/{album:id}', [DownloadFileController::class, 'downloadAlbum'])->name('downloadAlbum');

Route::get('admin/posts', [AlbumController::class, 'adminindex'])->middleware('admin');
Route::get('admin/posts/album', [AlbumController::class, 'album'])->middleware('admin');
Route::post('admin/posts/album', [AlbumController::class, 'store'])->middleware('admin');
Route::get('admin/posts/{album:id}/edit', [AlbumController::class, 'edit'])->middleware('admin');
Route::patch('admin/posts/{album:id}', [AlbumController::class, 'update'])->middleware('admin');
Route::delete('admin/posts/{album:id}', [AlbumController::class, 'destroy'])->middleware('admin');

Route::get('admin/posts/image', [ImageController::class, 'show'])->middleware('admin');
Route::post('admin/posts/image', [ImageController::class, 'store'])->middleware('admin')->name('storeimage');
Route::delete('posts/{image:id}', [ImageController::class, 'destroy'])->middleware('admin');

Route::get('admin/posts/sharing', [SharedWithController::class, 'sharing'])->middleware('admin');
Route::post('admin/posts/sharing/{album:id}', [SharedWithController::class, 'store'])->middleware('admin');
Route::get('admin/posts/editsharing', [SharedWithController::class, 'index'])->middleware('admin');
Route::delete('removesharing/{user:id}', [SharedWithController::class, 'destroy'])->middleware('admin')->name('revoke.sharing');

//verification for auth routes
Auth::routes(['verify' => true]);

//forget pass
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');


Route::get('searchAlbum', [DownloadFileController::class, 'searchAlbum'])->name('searchAlbum');
Route::get('/searchImage', [DownloadFileController::class, 'searchImage'])->name('searchImage');