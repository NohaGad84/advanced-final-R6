<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PublicController;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\MessageController;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('homepage');


Route::prefix('contact')->group(function () {
    Route::post('/', [ContactController::class, 'submit'])->name('contact.submit');
    Route::get('/messages/{id}', [ContactController::class, 'show'])->name('messages.show');

});



Route::group(['prefix' => 'public'], function () {
    Route::get('contactus', [PublicController::class, 'contact'])->name('contact');
    Route::get('/', [PublicController::class,'index'])->name('home');
    Route::get('testimonials',[PublicController::class, 'testimonials'])->name('testimonials');
    Route::get('topics/{id}', [PublicController::class,'topicDetails'])->name('topic-details');
    Route::get('topics-listing', [PublicController::class, 'Topicslist'])->name('topics-listing');
});



    Route::group([
        'controller' => TopicController::class,
        'prefix' => 'topics',
        'as' => 'admin.topics.',
        // 'middleware' => 'verified', 
    ], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/show','show')->name('show');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::put('{topic}', 'update')->name('update');
        Route::get('deleted', 'showDeleted')->name('deleted');
        Route::patch('{topic}/restore', 'restore')->name('restore');
        Route::delete('{topic}', 'destroy')->name('destroy');
        Route::delete('{topic}/force-delete', 'forceDelete')->name('forceDelete');
    });

    Route::group([
        'controller' => CategoryController::class,
        'prefix' => 'categories',
        'as' => 'admin.categories.',
        // 'middleware' => 'verified', 
    ], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::get('{category}/edit', 'edit')->name('edit');
        Route::put('{category}', 'update')->name('update');
        Route::get('deleted', 'showDeleted')->name('deleted');
        Route::patch('{category}/restore', 'restore')->name('restore');
        Route::delete('{category}', 'destroy')->name('destroy');
        Route::delete('{category}/force-delete', 'forceDelete')->name('forceDelete');
    });

    Route::group([
        'controller' => MessageController::class,
        'prefix' => 'messages',
        'as' => 'admin.messages.',
        // 'middleware' => 'verified', 
    ], function () {
        Route::get('/', 'index')->name('message');
        Route::get('messages/{id}','show')->name('show');
        Route::get('deleted', 'showDeleted')->name('deleted');
        Route::put('{message}/restore', 'restore')->name('restore');
        Route::delete('messages/{id}', 'destroy')->name('destroy');
        Route::delete('{message}/delete-permanently', 'deletePermanently')->name('delete-permanently');
    });

    Route::group([
        'controller' => TestimonialController::class,
        'prefix' => 'testimonials',
        'as' => 'admin.testimonials.',
        // 'middleware' => 'verified', 
    ], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::get('{testimonial}', 'show')->name('show');
        Route::post('store', 'store')->name('store');
        Route::get('{id}/edit', 'edit')->name('edit');
        Route::put('{id}', 'update')->name('update');
        Route::delete('{testimonial}', 'destroy')->name('destroy');

        Route::get('deleted', 'showDeleted')->name('deleted');
        Route::patch('{testimonial}/restore', 'restore')->name('restore');
        Route::delete('{testimonial}/force-delete', 'forceDelete')->name('forceDelete');
    });

    Route::group([
        'controller' => UserController::class,
        'prefix' => 'users',
        'as' => 'admin.users.',
        // 'middleware' => 'verified', 
    ], function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('users', 'store')->name('store');
        Route::get('{user}/edit', 'edit')->name('edit');
        Route::put('{user}', 'update')->name('update');
    });


Auth::routes(['verify'=>true]);

