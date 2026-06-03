<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::with('category')->latest();

        // Search
        $search = $request->search;

        if ($search) {
            $products->where(function ($query) use ($search) {
                $query->where('kode_produk', 'like', '%' . $search . '%')
                    ->orWhere('nama_produk', 'like', '%' . $search . '%');
            });
        }

        // Filter Kategori
        if ($request->category_id) {
            $products->where('category_id', $request->category_id);
        }

        return view('product.index', [
            'title' => 'Data Produk',
            'products' => $products->paginate(5)->withQueryString(),
            'categorys' => Category::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
