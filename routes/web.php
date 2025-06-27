<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/docs/postman', function () {
    return response()->download(base_path('docs/Patient_API.postman_collection.json'));
});
