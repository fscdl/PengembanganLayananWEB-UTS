<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Products;
use App\Models\Transactions;
use App\Models\Suppliers;
use App\Models\Categories;



class ProductController extends Controller
{
    public function __construct(Products $products, Transactions $transactions, Categories $categories, Suppliers $suppliers) {
        $this->products = $products;
        $this->transactions = $transactions;
        $this->categories = $categories;
        $this->suppliers = $suppliers;
    }
    public function index(): View {
        return view('products', [
            'products' => $this->products->with(['category', 'supplier'])->get(),
            'suppliers' => $this->suppliers->get(),
            'categories' => $this->categories->get()

        
        ]);
    }

    public function _destroy($product_id) {
        $this->products->where('id', $product_id)->delete();
        return back();
    }
    public function _create(Request $request) {
        $category = new Products;
        $category->name = $request->category;
        $category->save();
        return back();
    }


    public function jual(Request $request, $product_id) {
        $product = $this->products->with('category')->where('id', $product_id)->first();
        return view('sells', ['product' => $product]);
    }

    public function jual_post(Request $request, $product_id) {
        $product = $this->products->where('id', $product_id)->first();
        $transaction = new Transactions;
        

        $transaction->product_id = $product_id;

        $subtotal = $product->price * $request->qty;

        $transaction->subtotal = $subtotal;
        $transaction->qty = $request->qty;
        $transaction->save();
        return back();
    }

    public function _create_(Request $request) {
        $product = new Products;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->stocks = $request->stocks;
        $product->category_id = $request->category_id;
        $product->supplier_id = $request->supplier_id;
        $product->save();
        return back();

    }
}
