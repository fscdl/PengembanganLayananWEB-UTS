<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Categories;

class CategoryController extends Controller
{
    public function __construct(Categories $categories) {
        $this->categories = $categories;
    }

    public function index() {
        return view('categories', ['categories' => $this->categories->get()]);
    }
    public function _destroy($category_id) {
        $this->categories->where('id', $category_id)->delete();
        return back();
    }
    public function _create(Request $request) {
        $category = new Categories;
        $category->name = $request->category;
        $category->save();
        return back();
    }
}
