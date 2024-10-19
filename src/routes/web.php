<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MiddlewareController;
use Illuminate\Http\Request;
use App\Models\Contact;



Route::middleware('auth')->group(function () {
    Route::get('/', [ContactController::class, 'index']);
});

//Route::post('/contacts/confirm', [ContactController::class, 'confirm']);//

Route::post('/contacts/confirm', function (Request $request) {
    $name = $request->input('name');
    $gender = $request->input('gender');
    $email = $request->input('email');
    $address = $request->input('address');
    $building = $request->input('building');
    $category = $request->input('category_id');
    $content = $request->input('content');

    return view('confirm', compact('name', 'gender', 'email', 'address', 'building', 'category', 'content' ));
    })->name('confirm');

