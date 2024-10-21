<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\UserController;
use App\Models\Contact;


class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only([
        'first_name', 'last_name', 'gender', 'email', 'address', 'building', 'detail'
    ]);
        Contact::create($contact);
        return redirect('/');
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

    


}
