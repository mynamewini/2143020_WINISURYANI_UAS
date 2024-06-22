<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $title = 'Katalog Produk';
        $categories = Category::all();

        // Menampilkan data jumlah produk berdasarkan kategori
        $categories->map(function ($category) {
            $category->products_count = $category->products->count();
            return $category;
        });

        return view('admin.categories.index', compact('title', 'categories'));
    }

    public function create()
    {
        $title = 'Tambah Katalog Produk';
        return view('admin.categories.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'required|string',
        ]);

        Category::create($request->all());

        if ($request) {
            return redirect()->route('admin.categories.index')->with('success', 'Kategori produk berhasil ditambahkan');
        } else {
            return redirect()->route('admin.categories.index')->with('error', 'Kategori produk gagal ditambahkan');
        }
    }

    public function show(string $id)
    {
        // 
    }

    public function edit(string $id)
    {
        $title = 'Edit Kategori Produk';
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('title', 'category'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'required|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        if ($category) {
            return redirect()->route('admin.categories.index')->with('success', 'Kategori produk berhasil diperbarui');
        } else {
            return redirect()->route('admin.categories.index')->with('error', 'Kategori produk gagal diperbarui');
        }
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        if ($category) {
            return redirect()->route('admin.categories.index')->with('success', 'Kategori produk berhasil dihapus');
        } else {
            return redirect()->route('admin.categories.index')->with('error', 'Kategori produk gagal dihapus');
        }
    }
}
