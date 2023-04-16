<?php

use App\Http\Controllers\backend\postController;
use App\Http\Controllers\frontend\localController;
use App\Http\Controllers\frontend\blogPostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[blogPostController::class,'index'])->name('newpost.index');
Route::get('/about',[blogPostController::class,'about_page'])->name('post.about');
Route::get('/simplepost/{simplepost}',[blogPostController::class,'simpe_post'])->name('post.simplepost');
Route::get('/contact',[blogPostController::class,'contact_page'])->name('post.contact');

Route::get('/dashboard', function () {
    return view('backend.Admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('/post',postController::class)->middleware('auth');
Route::get('/post/{post}',[postController::class,'delete'])->middleware('auth')->name('post.delete');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('local/{local}',[localController::class,'local'])->name('local');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => [ 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

require __DIR__.'/auth.php';
