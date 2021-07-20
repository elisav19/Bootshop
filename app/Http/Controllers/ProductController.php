<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($slug) {
        $categories = Category::all();

        return view('product/index', compact('categories'));
    }
}
