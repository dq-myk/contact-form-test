<?php

namespace App\Actions\Fortify;

use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    public function authenticated(Request $request, $user)
    {
        return redirect('/admin');  // ログイン後 /admin にリダイレクト
    }
}