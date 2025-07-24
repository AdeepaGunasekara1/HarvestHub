<?php

use Illuminate\Support\Facades\Route;

// Public homepage
Route::get('/', function () {
    return view('welcome');
});

// Group routes under 'advisor' prefix and 'auth' middleware (requires login)
Route::middleware(['auth'])->prefix('advisor')->name('advisor.')->group(function () {

    // Dashboard page
    Route::get('/dashboard', function () {
        return view('advisor.dashboard');
    })->name('dashboard');

    // Register Farmer - GET form
    Route::get('/register', function () {
        return view('advisor.register-farmer');
    })->name('farmer-registration');

    // Register Farmer - POST submit
    Route::post('/register', function (\Illuminate\Http\Request $request) {
        // TODO: Validate and save farmer data here

        // For now, redirect back with success message
        return redirect()->route('advisor.farmer-registration')->with('success', 'Farmer registered successfully.');
    })->name('farmer-registration.submit');

    // Manage Farmers - show list
    Route::get('/manage', function () {
        // Dummy farmers array; replace with DB query later
        $farmers = [
            (object)[
                'id' => 1,
                'name' => 'Saman Perera',
                'nic' => '921234567V',
                'location' => 'Kurunegala',
                'crops' => 'Paddy',
                'phone' => '0771234567',
            ],
            (object)[
                'id' => 2,
                'name' => 'Nimali Fernando',
                'nic' => '991234567V',
                'location' => 'Matale',
                'crops' => 'Vegetables',
                'phone' => '0712345678',
            ],
        ];

        // You could add search/filter here based on request params

        return view('advisor.manage-farmers', compact('farmers'));
    })->name('manage-farmers');

    // Profile page - show form with logged in user data
    Route::get('/profile', function () {
        return view('advisor.profile');
    })->name('profile');

    // Profile update
    Route::patch('/profile', function (\Illuminate\Http\Request $request) {
        // TODO: Validate and update logged in user profile

        return redirect()->route('advisor.profile')->with('success', 'Profile updated successfully.');
    })->name('profile.update');

    // Reports page
    Route::get('/reports', function () {
        return view('advisor.reports');
    })->name('reports');
});
