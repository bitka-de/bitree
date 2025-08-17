<?php

use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Models\User;

// User-Übersicht nur für Master
Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});
// Maintenance page
Route::get('/', fn() => view('welcome'));

// Authenticated routes

// Dashboard
Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
// Profile
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
// MyLinks CRUD
Route::get('/mylinks', [App\Http\Controllers\MyLinksController::class, 'index'])->name('mylinks');
Route::post('/mylinks', [App\Http\Controllers\MyLinksController::class, 'store'])->name('mylinks.store');
Route::put('/mylinks/{link}', [App\Http\Controllers\MyLinksController::class, 'update'])->name('mylinks.update');
Route::delete('/mylinks/{link}', [App\Http\Controllers\MyLinksController::class, 'destroy'])->name('mylinks.destroy');
Route::post('/mylinks/reorder', [App\Http\Controllers\MyLinksController::class, 'reorder'])->name('mylinks.reorder');


Route::get('/@{username}', function ($username) {
    $user = User::where('username', $username)->first();
    if ($user) {
        $links = \App\Models\Link::where('user_id', $user->id)->orderBy('order')->get();
        return view('user', compact('user', 'links'));
    } else {
        return "Dieser User existiert nicht. Möchtest du ein Account anlegen?";
    }
})->name('profile.byusername');

// Username live validation
Route::post('/validate-username', function (Request $request) {
    $username = $request->input('username');
    // Nur kleine Buchstaben, Punkt, Bindestrich erlaubt
    if (!preg_match('/^[a-z.-]+$/', $username)) {
        return response()->json([
            'valid' => false,
            'message' => 'Nur kleine Buchstaben, Punkt und Bindestrich erlaubt.'
        ]);
    }
    if (strlen($username) < 3 || strlen($username) > 20) {
        return response()->json([
            'valid' => false,
            'message' => 'Der Username muss zwischen 3 und 20 Zeichen lang sein.'
        ]);
    }
    $exists = User::where('username', $username)->exists();
    if ($exists) {
        return response()->json([
            'valid' => false,
            'message' => 'Dieser Username ist bereits vergeben.'
        ]);
    }
    return response()->json([
        'valid' => true,
        'message' => 'Username ist verfügbar!'
    ]);
});



Route::middleware(['auth'])->group(function () {
    Route::get('/preview', function () {
        $links = \App\Models\Link::where('user_id', Auth::id())->orderBy('order')->get();
        return view('preview', compact('links'));
    })->name('preview');
});
