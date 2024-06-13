<?php

use Illuminate\Support\Facades\Route;
use App\Models\college_models;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
});

Route::get('/students', function () {
    return view('students');
});

Route::get('/courses', function () {
    return view('courses');
});

Route::get('/colleges', function () {
    // Retrieve all data from the college table
    $colleges = college_models::all();

    // Pass the data to the view
    return view('colleges', ['colleges' => $colleges]);
})->name('colleges');

Route::post('/colleges', function (Request $request) {
    // Validate and handle the incoming data
    $validated = $request->validate([
        'col_code' => 'required|unique:tblcolleges|max:255',
        'col_name' => 'required|max:255',
    ]);

    // Create a new college record
    college_models::create([
        'col_code' => $validated['col_code'],
        'col_name' => $validated['col_name'],
    ]);

    // Redirect back to the colleges list or another page
    return redirect()->route('colleges');
})->name('colleges.add');

// Update college route
Route::post('/colleges/{id}/edit', function (Request $request, $id) {
    // Validate the incoming data
    $request->validate([
        'col_code' => 'required|max:255',
        'col_name' => 'required|max:255',
    ]);

    // Find the college by ID and update its attributes
    $college = college_models::findOrFail($id);
    $college->col_code = $request->input('col_code');
    $college->col_name = $request->input('col_name');
    $college->save();

    // Redirect back to the colleges list or another page
    return redirect()->route('colleges');
})->name('colleges.update');
