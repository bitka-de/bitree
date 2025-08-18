<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

// User-Übersicht nur für Master
Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});
// Maintenance page
Route::get('/', fn() => view('welcome'));

// Authenticated routes

Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('dashboard');
    // Profile
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    // MyLinks CRUD
    Route::get('/mylinks', [App\Http\Controllers\MyLinksController::class, 'index'])->name('mylinks');
    Route::post('/mylinks', [App\Http\Controllers\MyLinksController::class, 'store'])->name('mylinks.store');
    Route::put('/mylinks/{link}', [App\Http\Controllers\MyLinksController::class, 'update'])->name('mylinks.update');
    Route::delete('/mylinks/{link}', [App\Http\Controllers\MyLinksController::class, 'destroy'])->name('mylinks.destroy');
    Route::post('/mylinks/reorder', [App\Http\Controllers\MyLinksController::class, 'reorder'])->name('mylinks.reorder');
});

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

// Email live validation
Route::post('/validate-email', function (Request $request) {
    $email = $request->input('email');
    $validator = Validator::make(['email' => $email], [
        'email' => 'required|email|max:255',
    ]);
    if ($validator->fails()) {
        return response()->json([
            'valid' => false,
            'message' => 'Bitte gültige E-Mail eingeben.'
        ]);
    }
    $exists = User::where('email', $email)->exists();
    return response()->json([
        'valid' => !$exists,
        'message' => $exists ? 'E-Mail ist bereits vergeben.' : 'E-Mail ist verfügbar.'
    ]);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/preview', function () {
        $links = \App\Models\Link::where('user_id', Auth::id())->orderBy('order')->get();
        return view('preview', compact('links'));
    })->name('preview');
});

// Registration route
Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'username' => ['required', 'string', 'min:3', 'max:20', 'regex:/^[a-z.-]+$/', 'unique:users,username'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'plan' => ['required', 'in:monthly,yearly'],
    ]);
    $user = \App\Models\User::create([
        'uid' => \Illuminate\Support\Str::uuid()->toString(),
        'username' => $validated['username'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']),
        'plan' => $validated['plan'],
    ]);
    // Sende Bestätigungs-E-Mail
    Mail::to($user->email)->send(new \App\Mail\WelcomeMail($user));
    return response()->json(['success' => true, 'message' => 'Account erstellt! Bitte prüfe deine E-Mails.']);
});
