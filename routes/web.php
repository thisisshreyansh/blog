<?php
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\SharedWithController;
use App\Http\Controllers\AlbumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DownloadFileController;
use App\Http\Controllers\ImageController;

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

// Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('/', [AlbumController::class, 'index'])->name('home');
Route::get('posts/{album:album_id}', [AlbumController::class, 'show']);

// Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// Route::get('categories/{category:slug}', function (Category $category) {
//     return view('posts',['posts' => $category->posts,
//     'currentCategory' => $category,
//     'categories' => Category::all()
//     ]);
// })->name('category');

// Route::get('authors/{author:username}', function (User $author) {
//     return view('posts.index',['posts' => $author->posts]);
// });

// Admin Section
// Route::middleware('can:admin')->group(function () {
//     Route::resource('admin/posts', AdminPostController::class)->except('show');
// });
 
Route::get('get/{file_name}', [DownloadFileController::class, 'downloadFile'])->name('downloadFile');

Route::get('admin/posts/category', [DownloadFileController::class, 'category']);
Route::post('admin/posts/category', [DownloadFileController::class, 'store']);

Route::get('admin/posts', [AlbumController::class, 'adminindex'])->middleware('admin');
Route::get('admin/posts/album', [AlbumController::class, 'album'])->middleware('admin');
Route::post('admin/posts/album', [AlbumController::class, 'store'])->middleware('admin');
Route::get('admin/posts/{album:album_id}/edit', [AlbumController::class, 'edit'])->middleware('admin');
Route::patch('admin/posts/{album:album_id}', [AlbumController::class, 'update'])->middleware('admin');
Route::delete('admin/posts/{album:album_id}', [AlbumController::class, 'destroy'])->middleware('admin');

Route::get('admin/posts/image', [ImageController::class, 'show'])->middleware('admin');
Route::post('admin/posts/image', [ImageController::class, 'store'])->middleware('admin');
Route::delete('posts/{image:album_id}', [ImageController::class, 'destroy'])->middleware('admin');

Route::get('admin/posts/sharing', [SharedWithController::class, 'sharing'])->middleware('admin');
Route::post('admin/posts/sharing', [SharedWithController::class, 'store'])->middleware('admin');
Route::get('admin/posts/editsharing', [SharedWithController::class, 'index'])->middleware('admin');
Route::delete('admin/posts/{sharing:album_id}', [SharedWithController::class, 'destroy'])->middleware('admin');
