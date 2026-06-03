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
        return view('product.create', [
            'title' => 'Tambah Produk',
            'categorys' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'kode_produk' => 'required|unique:products,kode_produk',
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        Product::create($validated);

        return redirect()
            ->route('product.index')
            ->with('success', 'Data produk berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('category');

        return view('product.show', [
            'title' => 'Detail Produk',
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', [
            'title' => 'Edit Produk',
            'product' => $product,
            'categorys' => Category::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'kode_produk' => 'required|unique:products,kode_produk,' . $product->id,
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
        ]);

        $product->update($validated);

        return redirect()
            ->route('product.index')
            ->with('success', 'Data produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('product.index')
            ->with('success', 'Data produk berhasil dihapus.');
    }
}
