<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transactions;

class TransactionController extends Controller
{
    public function __construct(Transactions $transactions) {
        $this->transactions = $transactions;
    }
    public function index() {
        return view('transactions', [
            'transactions' => $this->transactions->with('product')->get()
        ]);
    }
}
