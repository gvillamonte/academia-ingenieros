<?php

use App\Http\Controllers\AcademyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CmsController;
use Illuminate\Support\Facades\Route;

// Rutas Principales de la Plataforma Web (Front-office)
Route::get('/', [AcademyController::class, 'home'])->name('home');
Route::get('/courses', [AcademyController::class, 'courses'])->name('courses');
Route::get('/courses-list', [AcademyController::class, 'coursesList'])->name('courses.list');
Route::get('/course/{slug?}', [AcademyController::class, 'courseDetail'])->name('course.detail');
Route::get('/lessons/{slug?}', [AcademyController::class, 'lessons'])->name('lessons');
Route::get('/login', [AcademyController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
Route::get('/register', [AcademyController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/shopping-cart', [AcademyController::class, 'shoppingCart'])->name('cart');
Route::get('/my-account', [AcademyController::class, 'myAccount'])->name('my.account');
Route::post('/my-account', [AuthController::class, 'updateProfile'])->name('my.account.update');
Route::get('/my-courses', [AcademyController::class, 'myCourses'])->name('my.courses');
Route::get('/about-us', [AcademyController::class, 'about'])->name('about');
Route::get('/privacy-policy', [AcademyController::class, 'privacy'])->name('privacy');
Route::get('/terms-and-condition', [AcademyController::class, 'terms'])->name('terms');
Route::get('/buscar-ingeniero', [AcademyController::class, 'buscarIngeniero'])->name('buscar.ingeniero');

// Redirecciones de compatibilidad para enlaces heredados (.html y /web)
Route::redirect('/web', '/');
Route::redirect('/index.html', '/');
Route::redirect('/courses.html', '/courses');
Route::redirect('/courses_list.html', '/courses-list');
Route::redirect('/page_course.html', '/course');
Route::redirect('/lessons.html', '/lessons');
Route::redirect('/login.html', '/login');
Route::redirect('/register.html', '/register');
Route::redirect('/shopping_cart.html', '/shopping-cart');
Route::redirect('/my_account.html', '/my-account');
Route::redirect('/my_courses.html', '/my-courses');
Route::redirect('/about_us.html', '/about-us');
Route::redirect('/privacy_policy.html', '/privacy-policy');
Route::redirect('/terms_and_condition.html', '/terms-and-condition');
Route::redirect('/buscar_ingeniero.html', '/buscar-ingeniero');

// Panel Administrativo (CMS Backoffice)
Route::prefix('cms')->group(function () {
    Route::get('/', [CmsController::class, 'index'])->name('cms.dashboard');
});
