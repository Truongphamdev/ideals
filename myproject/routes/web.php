<?php

use App\Http\Controllers\Admin\adminController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\idealController as AdminIdealController;
use App\Http\Controllers\Admin\userController as AdminUserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IdealController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\IdeaLikeController;



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
Route::get('lang/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'es','vi'])) {
        // Cập nhật session với giá trị ngôn ngữ mới
        session()->put('locale', $lang);
    }
    // dd(session()->get('locale'));
    return redirect()->back(); // Quay lại trang trước
})->name('lang');


Route::get('',[IdealController::class,'index'])->name('index');
Route::get('term/', function () {
    return view('term');
})->name('term');
Route::group(['prefix'=>'ideal/','middleware'=>['auth']],function(){

    Route::post('submit/',[IdealController::class,'store'])->name('store')->withoutMiddleware(['auth']);
    Route::get('/{idea}',[IdealController::class,'show'])->name('ideas.show')->withoutMiddleware(['auth']);
    Route::delete('/delete/{idea}',[IdealController::class,'delete'])->name('ideal.delete');
    Route::get('/{idea}/edit',[IdealController::class,'edit'])->name('ideal.edit');
    Route::put('/{idea}/update',[IdealController::class,'update'])->name('ideal.update');
    //commment
    Route::post('/{idea}/comment',[CommentController::class,'store'])->name('ideas.comment.store');
});
Route::resource('user',UserController::class)->only('show');
Route::resource('user',UserController::class)->only('edit','update')->middleware('auth');

Route::get('profile',[UserController::class,'profile'])->name('profile')->middleware('auth');
// follow
Route::post('users/{user}/follow',[FollowController::class,'follow'])->middleware(['auth'])->name('follow');
Route::post('users/{user}/unfollow',[FollowController::class,'unfollow'])->middleware(['auth'])->name('unfollow');
// like
Route::post('ideas/{idea}/like',[IdeaLikeController::class,'like'])->middleware(['auth'])->name('like');
Route::post('ideas/{idea}/unlike',[IdeaLikeController::class,'unlike'])->middleware(['auth'])->name('unlike');
// Route::resource('ideas',IdealController::class)->except(['index','create'])->middleware('auth');
// Route::resource('ideas',IdealController::class)->only(['show']);

// auth
Route::get('idea/register',[AuthController::class,'register'])->name('idea.register');
Route::post('register',[AuthController::class,'store'])->name('register');

Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('login',[AuthController::class,'authenticate'])->name('authenticate');

Route::post('logout',[AuthController::class,'logout'])->name('logout');

Route::get('feed',FeedController::class)->middleware('auth')->name('feed');

// admin
Route::middleware(['auth','can:admin'])->prefix('/admin')->as('admin.')->group(function(){

    Route::get('/',[adminController::class,'index'])->name('admin');
    Route::resource('user',AdminUserController::class)->only('index');
    Route::resource('ideal',AdminIdealController::class)->only('index');
    Route::resource('comments',CommentsController::class)->only('index','destroy');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
