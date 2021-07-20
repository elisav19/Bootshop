<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug) {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->first();

        return view('category/index', compact('categories', 'category'));
    }
}
