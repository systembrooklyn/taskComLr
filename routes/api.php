<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;

// routes/api.php
Route::get('/starts/check', function (Request $request) {
    $email = $request->query('email');
    $exists = User::where('email', $email)->exists();

    return response()->json(['exists' => $exists]);
});

Route::post('/register-user', function (Request $request) {
    $email = $request->input('email');

    if (User::where('email', $email)->exists()) {
        return response()->json(['message' => 'Email already exists'], 400);
    }

    $user = User::create([
        'email' => $email,
        'password' => Hash::make('password'), // كلمة مرور افتراضية
    ]);

    return response()->json(['data' => $user, 'message' => 'User created successfully'], 201);
});



