<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RentController;
use App\Http\Controllers\PaymentConfirmationController;
use App\Http\Controllers\PendingRequestsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\BookReportController;

Route::get('/users/pdf', [PdfController::class, 'downloadPdf']);
Route::get('/books/pdf', [BookReportController::class, 'downloadpdf']);

Route::get('/admin', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/admin/manage-users', [AdminController::class, 'manageUsers'])->name('admin.manageUsers');
Route::get('/admin/manage-books', [AdminController::class, 'manageBooks'])->name('admin.manageBooks');
Route::delete('/admin/remove-book/{book}', [AdminController::class, 'removeBook'])->name('admin.removeBook');
Route::patch('/admin/update-book/{book}', [AdminController::class, 'updateBook'])->name('admin.updateBook');
Route::delete('/admin/manage-users/{user}', [AdminController::class, 'removeUser'])->name('admin.removeUser');
Route::patch('/admin/manage-users/{user}', [AdminController::class, 'updateUser'])->name('admin.updateUser');
Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');


Route::get('/', [WelcomeController::class, 'welcome']);
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::view('/legal', 'legal')->name('legal');
Route::view('/contact', 'contact')->name('contact');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');

Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{id}', [BookController::class, 'showDetails'])->name('books.details');
Route::get('/books/genre/{genre}', [BookController::class, 'genre'])->name('books.genre');
Route::get('/genres/{genre}', [BookController::class, 'showByGenre'])->name('genres.showByGenre');
Route::delete('/books/{book}', [BookController::class, 'remove'])->name('books.remove');
Route::post('/cancel-rent/{rent}', [RentController::class, 'cancelRent'])->name('cancel-rent');

Route::get('/search', [BookController::class, 'search'])->name('search');

// Profile routes grouped under /profile
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile/update-address', [ProfileController::class, 'updateAddress'])->name('profile.updateAddress');
    Route::patch('/profile/update-phone-number', [ProfileController::class, 'updatePhoneNumber'])->name('profile.updatePhoneNumber');
});

// Rent-related routes
Route::middleware(['auth'])->group(function () {
    Route::post('/confirm/{book}', [PaymentConfirmationController::class, 'rentBook'])->name('confirm.rent');
    Route::get('/my-rents', [RentController::class, 'myRents'])->name('my.rents');
    Route::post('/payment-confirmation/{book}', [PaymentConfirmationController::class, 'showPaymentConfirmation'])->name('payment-confirmation');
    Route::post('/return-book/{rent}', [RentController::class, 'returnBook'])->name('return-book');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/pending-requests', [PendingRequestsController::class, 'showPendingRequests'])->name('pending-requests');
    Route::post('/approve-request/{rent}', [PendingRequestsController::class, 'approveRequest'])->name('approve-request');
    Route::post('/decline-request/{rent}', [PendingRequestsController::class, 'declineRequest'])->name('decline-request');
    Route::get('/my-listings', [BookController::class, 'myListings'])->name('my-listings');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::post('/books/charge-fee', [BookController::class, 'chargeFee'])->name('charge.fee');
});