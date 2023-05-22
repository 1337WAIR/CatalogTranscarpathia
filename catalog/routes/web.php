<?php

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


Auth::routes();
Route::get('/', \App\Http\Controllers\Blog\IndexController::class) -> name('blog.index');
Route::get('/catalog', \App\Http\Controllers\Catalog\IndexController::class) -> name('catalog.index');
Route::get('/search', \App\Http\Controllers\Search\SearchController::class) -> name('search');
Route::get('/searchcatalog', \App\Http\Controllers\Search\CatalogSearchController::class) -> name('catalog.search');
Route::get('/reading', \App\Http\Controllers\PostReading\IndexController::class) -> name('reading');
Route::group(['namespace'=> 'Users', 'prefix'=>'users'], function(){
    Route::group(['namespace' => 'AccountData', 'prefix' => 'accountdata'], function (){
        Route::get('/', \App\Http\Controllers\Users\AccountData\IndexController::class) -> name('accountdata.index');
        Route::patch('/{users}', \App\Http\Controllers\Users\AccountData\UpdateController::class)->name('account.update');
    });
    Route::group(['namespace' => 'Liked', 'prefix' => 'liked'], function (){
        Route::get('/liked', \App\Http\Controllers\Users\Liked\IndexController::class) -> name('liked.index');
        Route::delete('/{post}', \App\Http\Controllers\Users\Liked\DeleteController::class) -> name('liked.delete');
        Route::post('{posts}/likes', \App\Http\Controllers\Users\Liked\StoreController::class) -> name('like.store');
    });
    Route::group(['namespace' => 'UserPost', 'prefix' => 'userposts'], function (){
        Route::get('/', \App\Http\Controllers\Users\UserPost\IndexController::class)->name('user.post.index');
        Route::get('/create', \App\Http\Controllers\Users\UserPost\CreateController::class)->name('user.post.create');
        Route::post('/', \App\Http\Controllers\Users\UserPost\StoreController::class)->name('user.post.store');
        Route::get('/{post}', \App\Http\Controllers\Users\UserPost\EditController::class)->name('user.post.edit');
        Route::patch('/{post}', \App\Http\Controllers\Users\UserPost\UpdateController::class)->name('user.post.update');
        Route::delete('/{post}', \App\Http\Controllers\Users\UserPost\DeleteController::class)->name('user.post.delete');
    });
});
Route::group(['namespace'=> 'Admin', 'prefix'=>'admin', 'middleware'=>['auth','admin']], function(){
    Route::group(['namespace' => 'Main'], function() {
        Route::get('/', \App\Http\Controllers\Admin\Main\IndexController::class) -> name('main.index');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function (){
        Route::get('/', \App\Http\Controllers\Admin\Category\IndexController::class)->name('category.index');
        Route::post('/', \App\Http\Controllers\Admin\Category\StoreController::class)->name('category.store');
        Route::patch('/{category}', \App\Http\Controllers\Admin\Category\UpdateController::class)->name('category.update');
        Route::delete('/{category}', \App\Http\Controllers\Admin\Category\DeleteController::class)->name('category.delete');
    });
    Route::group(['namespace' => 'Address', 'prefix' => 'addresses'], function (){
        Route::get('/', \App\Http\Controllers\Admin\Address\IndexController::class)->name('address.index');
        Route::post('/', \App\Http\Controllers\Admin\Address\StoreController::class)->name('address.store');
        Route::patch('/{address}', \App\Http\Controllers\Admin\Address\UpdateController::class)->name('address.update');
        Route::delete('/{address}', \App\Http\Controllers\Admin\Address\DeleteController::class)->name('address.delete');
    });
    Route::group(['namespace' => 'User', 'prefix' => 'users'], function (){
        Route::get('/', \App\Http\Controllers\Admin\User\IndexController::class)->name('user.index');
        Route::post('/', \App\Http\Controllers\Admin\User\StoreController::class)->name('user.store');
        Route::patch('/{user}', \App\Http\Controllers\Admin\User\UpdateController::class)->name('user.update');
        Route::delete('/{user}', \App\Http\Controllers\Admin\User\DeleteController::class)->name('user.delete');
    });
    Route::group(['namespace' => 'Post', 'prefix' => 'posts'], function (){
        Route::get('/', \App\Http\Controllers\Admin\Post\IndexController::class)->name('post.index');
        Route::post('/', \App\Http\Controllers\Admin\Post\StoreController::class)->name('post.store');
        Route::get('/{post}', \App\Http\Controllers\Admin\Post\EditController::class)->name('post.edit');
        Route::patch('/{post}', \App\Http\Controllers\Admin\Post\UpdateController::class)->name('post.update');
        Route::delete('/{post}', \App\Http\Controllers\Admin\Post\DeleteController::class)->name('post.delete');
    });
});

