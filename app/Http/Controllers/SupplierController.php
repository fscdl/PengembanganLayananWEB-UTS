<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Suppliers;

class SupplierController extends Controller
{
    public function __construct(Suppliers $suppliers) {
        $this->suppliers = $suppliers;
    }
    public function index() {
        return view('suppliers', ['suppliers' => $this->suppliers->get()]);
    }
    public function _destroy($supplier_id) {
        $this->suppliers->where('id', $supplier_id)->delete();
        return back();
    }
    public function _create(Request $request) {
        $category = new Suppliers;
        $category->name = $request->supplier;
        $category->save();
        return back();
    }
}
