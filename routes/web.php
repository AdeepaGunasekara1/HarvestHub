<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

// Advisor Dashboard
Route::get('/advisor/dashboard', function () {
    return view('advisor.dashboard');
})->name('advisor.dashboard');

// Register Farmer (GET)
Route::get('/advisor/register-farmer', function () {
    return view('advisor.register-farmer');
})->name('advisor.farmer-registration');

// Register Farmer (POST)
Route::post('/advisor/register-farmer', function (Request $request) {
    // Handle registration logic here

    return redirect()->route('advisor.farmer-registration')->with('success', 'Farmer registered successfully!');
})->name('advisor.farmer-registration.submit');

// Manage Farmers (List with search & pagination)
Route::get('/advisor/manage-farmers', function (Request $request) {
    // Dummy farmers data - replace with DB query in production
    $farmersData = collect([
        (object)[
            'id' => 1,
            'name' => 'Kamal Perera',
            'nic' => '902301234V',
            'location' => 'Anuradhapura',
            'crops' => 'Paddy, Corn',
            'phone' => '0771234567'
        ],
        (object)[
            'id' => 2,
            'name' => 'Sunil Fernando',
            'nic' => '912305678V',
            'location' => 'Kurunegala',
            'crops' => 'Chili, Onion',
            'phone' => '0777654321'
        ],
        // Add more farmers here
    ]);

    $search = $request->input('search');

    // Filter farmers by name or location if search provided
    if ($search) {
        $farmersData = $farmersData->filter(function ($farmer) use ($search) {
            return str_contains(strtolower($farmer->name), strtolower($search))
                || str_contains(strtolower($farmer->location), strtolower($search));
        });
    }

    // Pagination setup
    $perPage = 5;
    $page = $request->input('page', 1);
    $offset = ($page - 1) * $perPage;

    $itemsForCurrentPage = $farmersData->slice($offset, $perPage)->values();

    $paginatedFarmers = new LengthAwarePaginator(
        $itemsForCurrentPage,
        $farmersData->count(),
        $perPage,
        $page,
        ['path' => $request->url(), 'query' => $request->query()]
    );

    return view('advisor.manage-farmers', ['farmers' => $paginatedFarmers]);
})->name('advisor.manage-farmers');

// Edit Farmer (GET)
Route::get('/advisor/farmer/{id}/edit', function ($id) {
    // Load farmer data by $id - example static data
    $farmer = (object)[
        'id' => $id,
        'name' => 'Sample Farmer',
        'nic' => '123456789V',
        'location' => 'Sample Location',
        'crops' => 'Sample Crops',
        'phone' => '0770000000'
    ];

    return view('advisor.edit-farmer', compact('farmer'));
})->name('advisor.farmer.edit');

// Update Farmer (POST)
Route::post('/advisor/farmer/{id}/update', function ($id) {
    // Handle update logic here

    return redirect()->route('advisor.manage-farmers')->with('success', 'Farmer updated successfully!');
})->name('advisor.farmer.update');

// Delete Farmer (DELETE)
Route::delete('/advisor/farmer/{id}/delete', function ($id) {
    // Handle delete logic here

    return redirect()->route('advisor.manage-farmers')->with('success', 'Farmer deleted successfully!');
})->name('advisor.farmer.delete');

// Reports
Route::get('/advisor/reports', function () {
    return view('advisor.reports');
})->name('advisor.reports');

// Profile View
Route::get('/advisor/profile', function () {
    return view('advisor.profile');
})->name('advisor.profile');

// Profile Update (POST)
Route::post('/advisor/profile/update', function () {
    return back()->with('success', 'Profile updated!');
})->name('advisor.profile.update');


