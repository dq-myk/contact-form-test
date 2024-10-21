<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MiddlewareController;
use App\Models\Contact;

Route::get('/login', [UserController::class, 'index']);
Route::post('/register', [UserController::class, 'store']);

Route::middleware('auth')->group(function() {
    Route::get('/', [UserController::class, 'admin']);
});



/*Route::post('/contacts/confirm', [ContactController::class, 'confirm']);*/


/*Route::post('/contacts/confirm', function (Request $request) {
    $name = $request->input('name');
    $gender = $request->input('gender');
    $email = $request->input('email');
    $address = $request->input('address');
    $building = $request->input('building');
    $category = $request->input('category_id');
    $detail = $request->input('detail');

    return view('confirm', compact('name', 'gender', 'email', 'address', 'building', 'category', 'detail' ));
    })->name('confirm');*/

/*Route::post('/contacts/confirm', function (Request $request) {
    // リクエストの全データを配列で取得し、$contactに格納
    $contact = $request->only([
        'name', 'gender', 'email', 'address', 'building', 'category_id', 'detail'
    ]);

    // ビューに$contact変数を渡す
    return view('confirm', compact('contact'));
})->name('confirm');*/

