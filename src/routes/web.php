<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MiddlewareController;
use App\Models\Contact;
use App\Models\Category;


Route::get('/login', [UserController::class, 'index'])->name('login');
Route::post('/register', [UserController::class, 'store']);

// 認証後のリダイレクト先を管理画面に設定
Route::get('/admin', function () {
    $categories = Category::all(); // カテゴリを取得
    $contacts = Contact::all(); // コンタクトを取得
    $contacts = Contact::Paginate(7); // 7件ごとにページネート
    return view('admin', compact('contacts', 'categories')); // 変数をビューに渡す
})->name('admin')->middleware('auth');

// ログアウト後の表示画面をログイン画面に設定
Route::post('/logout', function () {
    auth()->logout(); // ログアウト処理
    return redirect('/admin'); // admin.blade.php にリダイレクト
})->name('logout');

Route::get('/admin/search', [UserController::class, 'search']);


Route::get('/', [ContactController::class, 'index']);
Route::post('/contacts/confirm', [ContactController::class, 'confirm']);
Route::post('/contacts', [ContactController::class, 'store']);


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

