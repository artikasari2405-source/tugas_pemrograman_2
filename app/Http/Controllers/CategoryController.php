<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->search;

        $categorys = Category::latest();

        if ($keyword) {
            $categorys->where('kode_kategori', 'like', '%' . $keyword . '%')
                ->orWhere('nama_kategori', 'like', '%' . $keyword . '%');
        }

        $categorys = $categorys->paginate(3);

        return view('category.index', [
            'title' => 'Category',
            'categorys' => $categorys,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create', [
            'title' => 'Tambah Category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_kategori' => 'required|unique:categories,kode_kategori',
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        Category::create($validated);

        return redirect()
            ->route('category.index')
            ->with('success', 'Data kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('category.edit', [
            'title' => 'Edit Category',
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'kode_kategori' => 'required|unique:categories,kode_kategori,' . $category->id,
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        $category->update($validated);

        return redirect()
            ->route('category.index')
            ->with('success', 'Data kategori berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete($category);
        return to_route('category.index')->withSuccess('Data berhasil dihapus');
    }
}
