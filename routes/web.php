<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServicePageController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/about/histoire-et-heritage', [HomeController::class, 'history'])->name('history');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'contactSend'])->middleware('throttle:10,1')->name('contact.send');
Route::get('/service', [HomeController::class, 'service'])->name('service');
Route::get('/service/{slug}', [HomeController::class, 'serviceShow'])->name('service.show');
Route::get('/project', [HomeController::class, 'project'])->name('project');

/*
 * Administration: the company edits the site content without touching the code.
 */
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/connexion', [AuthController::class, 'create'])->name('login');
        Route::post('/connexion', [AuthController::class, 'store'])->middleware('throttle:6,1')->name('login.store');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/deconnexion', [AuthController::class, 'destroy'])->name('logout');

        Route::get('/', DashboardController::class)->name('dashboard');

        Route::get('/entreprise', [SettingsController::class, 'edit'])->name('settings.edit');
        Route::put('/entreprise', [SettingsController::class, 'update'])->name('settings.update');

        Route::get('/services', [ServicePageController::class, 'index'])->name('services.index');
        Route::get('/services/{servicePage}', [ServicePageController::class, 'edit'])->name('services.edit');
        Route::put('/services/{servicePage}', [ServicePageController::class, 'update'])->name('services.update');

        Route::resource('projets', ProjectController::class)->except('show')
            ->parameters(['projets' => 'project'])->names('projects');
        Route::resource('equipe', TeamMemberController::class)->except('show')
            ->parameters(['equipe' => 'member'])->names('team');

        Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
        Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
        Route::get('/messages/{message}/cv', [MessageController::class, 'cv'])->name('messages.cv');
        Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

        Route::get('/compte', [AccountController::class, 'edit'])->name('account.edit');
        Route::put('/compte', [AccountController::class, 'update'])->name('account.update');
    });
});
