<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\UserController;
use App\Models\Contact;
use App\Models\Category;


class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

        public function confirm(ContactRequest $request)
    {
        // リクエストの全データを配列で取得し、$contactに格納
        $contact = $request->only([
        'first_name', 'last_name', 'gender', 'email', 'address', 'building', 'detail'
    ]);
        // ビューに$contact変数を渡す
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only([
        'first_name', 'last_name', 'gender', 'email', 'address', 'building', 'detail'
    ]);
        Contact::create($contact);
        return view('thanks');
    }

}
