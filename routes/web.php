<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    Route::get('/dashboard', function () {
        return Inertia\Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('posts', PostController::class);
});

Route::get('/register', [RegisterController::class, 'create'])
    ->middleware(['guest'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->middleware(['guest']);

// Route::group(['middleware' => 'auth'], function () {
//     Route::group(['middleware' => 'role:student', 'prefix' => 'student', 'as' => 'student.'], function () {
//         Route::resource('lessons', \App\Http\Controllers\Students\LessonController::class);
//     });
//     Route::group(['middleware' => 'role:teacher', 'prefix' => 'teacher', 'as' => 'teacher.'], function () {
//         Route::resource('courses', \App\Http\Controllers\Teachers\CourseController::class);
//     });
// });




Route::get('/', [BlogController::class, 'index'])->name('blog_posts');
Route::get('/{slug}', [BlogController::class, 'show'])->name('blog_post');
Route::get('/user/{userId}', [BlogController::class, 'user'])->name('blog_user_posts');
Route::get('/category/{slug}', [BlogController::class, 'category'])->name('blog_category_posts');
Route::get('/tag/{slug}', [BlogController::class, 'tag'])->name('blog_tag_posts');
