<?php

use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// Change language
Route::get('/language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
})->name('language_switcher_url');

// All Listings
Route::get('/', [ListingController::class, 'index'])->name('home_url');

// Show Create Form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth')->name('listings_create_form_url');

// Store Listing Data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth')->name('store_listing_url');

// Show Edit Form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth')->name('listing_edit_form_url');

// Update Listing
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth')->name('update_listing_url');

// Delete Listing
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth')->name('delete_listing_url');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth')->name('manage_listings_url');

// Single Listing
Route::get('/listings/{listing}', [ListingController::class, 'show'])->name('show_single_listing_url');

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create'])->middleware('guest')->name('register_form_url');

// Create New User
Route::post('/users', [UserController::class, 'store'])->name('create_new_user_url');

// Log User Out
Route::post('users/logout', [UserController::class, 'logout'])->middleware('auth')->name('user_logout_url');

// Show Login Form
Route::get('/login', [UserController::class, 'login'])->middleware('guest')->name('login_form_url');

// Log In User
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->name('users_authenticate_url');

// Show all listings from selected company
Route::get('/company/listings/{company_id}', [UserController::class, 'company_listings'])->name('company_listings_url');





