<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'amount' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('products.create')->with('success', 'Product added successfully.');
    }
}
