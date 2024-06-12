<?php

use Illuminate\Support\Facades\Route;
use App\Models\College;

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
    $colleges = college::all();

    // Pass the data to the view
    return view('colleges', ['colleges' => $colleges]);
});