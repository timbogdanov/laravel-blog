<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Accounts\AccountsController;

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

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
*/
Auth::routes(['verify' => true]);
Route::post('/email/verification-notification', function (Request $request) {
    Auth::user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


/*
|--------------------------------------------------------------------------
| Posts
|--------------------------------------------------------------------------
*/
Route::get('/', [PostsController::class, 'index']);
Route::get('/posts/create', [PostsController::class, 'create']);
Route::post('/posts', [PostsController::class, 'store']);
Route::delete('/posts/{post}', [PostsController::class, 'destroy']);
Route::get('/posts/{post}', [PostsController::class, 'show']);
Route::post('/posts/{post}/comments', [CommentsController::class, 'store']);


/*
|--------------------------------------------------------------------------
| Categories
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoriesController::class, 'index']);
    Route::post('/', [CategoriesController::class, 'store']);
    Route::get('/{category}', [CategoriesController::class, 'show']);
});


/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'profile'], function () {
    Route::get('/{user}', [ProfilesController::class, 'show']);
    Route::post('/{user}/savedposts/{savedpost}', [ProfilesController::class, 'save_post']);
    Route::delete('/{user}/savedposts/{savedpost}', [ProfilesController::class, 'delete_saved_post']);
    Route::post('/{id}/addfriend', [ProfilesController::class, 'add_friend']);
    Route::post('/{id}/removefriend', [ProfilesController::class, 'remove_friend']);
});


/*
|--------------------------------------------------------------------------
| Debtor Accounts
|--------------------------------------------------------------------------
*/
Route::get('/accounts', [AccountsController::class, 'accounts']);
Route::post('/accounts', [AccountsController::class, 'import_accounts']);
Route::get('/account/{account}', [AccountsController::class, 'show_account']);