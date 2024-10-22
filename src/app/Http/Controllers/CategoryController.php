<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function store(CategoryRequest $request)
    $category = $request->only(['content']);
    return redirect('/')

    // Contact とのリレーション (1対多)
    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }


}
