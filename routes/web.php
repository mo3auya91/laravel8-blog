<?php

use App\Http\Controllers\PostController;
use App\Http\Livewire\CreatePost;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\ConfirmablePasswordController;
use Laravel\Fortify\Http\Controllers\EmailVerificationNotificationController;
use Laravel\Fortify\Http\Controllers\NewPasswordController;
use Laravel\Fortify\Http\Controllers\PasswordController;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController;
use Laravel\Fortify\Http\Controllers\ProfileInformationController;
use Laravel\Fortify\Http\Controllers\RecoveryCodeController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticatedSessionController;
use Laravel\Fortify\Http\Controllers\TwoFactorAuthenticationController;
use Laravel\Fortify\Http\Controllers\TwoFactorQrCodeController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::post('posts/create', [CreatePost::class, 'createPost'])->name('livewire.posts.show');
    Route::resource('posts', PostController::class)->except(['show', 'store']);
    Route::get('posts/{post}/{slug?}', [PostController::class, 'show'])->name('posts.show');
});

$limiter = config('fortify.limiters.login');

Route::middleware(['auth'])->group(function () use ($limiter) {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    if (Features::enabled(Features::emailVerification())) {
        Route::get('/email/verify', '\Laravel\Fortify\Http\Controllers\EmailVerificationPromptController')
            ->name('verification.notice');

        Route::get('/email/verify/{id}/{hash}', '\Laravel\Fortify\Http\Controllers\VerifyEmailController')
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

        Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware(['throttle:6,1'])
            ->name('verification.send');
    }
    // Profile Information...
    if (Features::enabled(Features::updateProfileInformation())) {
        Route::put('/user/profile-information', [ProfileInformationController::class, 'update']);
    }

    // Passwords...
    if (Features::enabled(Features::updatePasswords())) {
        Route::put('/user/password', [PasswordController::class, 'update']);
    }

    // Password Confirmation...
    Route::get('/user/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');

    Route::post('/user/confirm-password', [ConfirmablePasswordController::class, 'store']);

    // Two Factor Authentication...
    if (Features::enabled(Features::twoFactorAuthentication())) {
        Route::post('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'store']);

        Route::delete('/user/two-factor-authentication', [TwoFactorAuthenticationController::class, 'destroy']);

        Route::get('/user/two-factor-qr-code', [TwoFactorQrCodeController::class, 'show']);

        Route::get('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'index']);

        Route::post('/user/two-factor-recovery-codes', [RecoveryCodeController::class, 'store']);
    }
});

Route::middleware(['guest'])->group(function () use ($limiter) {
    // Registration...
    if (Features::enabled(Features::registration())) {
        Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
        Route::post('register', [RegisteredUserController::class, 'store']);
    }

    Route::get('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'create'])->name('two-factor.login');
    Route::post('/two-factor-challenge', [TwoFactorAuthenticatedSessionController::class, 'store']);

    if (Features::enabled(Features::resetPasswords())) {
        Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');

        Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.update');
    }

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store'])->middleware(array_filter([
        'guest',
        $limiter ? 'throttle:' . $limiter : null,
    ]));
});
