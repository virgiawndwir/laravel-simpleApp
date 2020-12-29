<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transaction;
use App\Models\Product;

use DB;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('transaction.index', compact('products'));
    }

    public function cart($id)
    {
        $product = Product::find($id);
        return view('transaction.cart', compact('product'));
    }

    public function countPrice(Request $request, $id)
    {
        $price = Product::whereId($id)->pluck('price')->first();
        $qty = Product::whereId($id)->pluck('qty')->first();
        $userMoney = $request->userMoney;
        $userQty = $request->userQty;
        $newQty = ($qty - $userQty);
        // dd($newQty);

        $total = $request->userTotal;
        $total = ($price * $userQty);
        $change = ($userMoney - $total);

        $data = Product::whereQty($qty)->update(['qty' => $newQty]);
        DB::commit();

        return view('transaction.total', compact('total', 'price', 'userQty', 'change', 'userMoney'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Transaction $transaction)
    {
        //
    }

    public function edit(Transaction $transaction)
    {
        //
    }

    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    public function destroy(Transaction $transaction)
    {
        //
    }
}
