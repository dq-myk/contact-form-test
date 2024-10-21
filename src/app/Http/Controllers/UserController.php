<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Contact;

class UserController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(UserRequest $request)
    {
        $user = $request->all();
        $user['password'] = Hash::make($request->password);  // パスワードの暗号化
        User::create($user);
        return redirect('login');
    }

    public function admin()
        {
            $contacts = Contact::Paginate(7);
            return view('admin', compact('contacts'));
        }


    /*public function index()
    {
        return view('/admin');
    }*/


    /*public function show()
    {
        return view('auth.register');
    }*/

    /*public function register(UserRequest $request)
    {
        $user = $request->all();
        User::create($user);

        return redirect()->route('login');
    }*/

    

    /*public function index()
    {
        return view('/admin');
    }*/
}
