<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        $title = 'Produk';
        $products = Product::all();
        $categories = Category::all();

        return view('admin.products.index', compact('title', 'products', 'categories'));
    }

    public function create()
    {
        $title = 'Tambah Produk';
        $categories = \App\Models\Category::all();

        return view('admin.products.create', compact('title', 'categories'));
    }

    public function store(Request $request)
    {
        // Validate
        $request->validate([
            'name'          => 'required',
            'price'         => 'required|numeric',
            'description'   => 'required',
            'stock'         => 'required|numeric',
            'photo'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'category_id'   => 'required|exists:categories,id',
        ]);

        // Upload photo
        $photo = $request->file('photo');
        
        // Nama File adalah nama produk yang diinputkan dengan ekstensi yang sama dengan file yang diupload, misal Roti Tawar jadi roti_tawar.jpg
        $nama_file = strtolower(str_replace(' ', '_', $request->name)) . '.' . $photo->getClientOriginalExtension();
        $photo->storeAs('public/products', $nama_file);

        // Save to database
        $product = [
            'name'          => $request->name,
            'price'         => $request->price,
            'description'   => $request->description,
            'stock'         => $request->stock,
            'photo'         => $photo->hashName(),
            'category_id'   => $request->category_id,
        ];
  
        $product = Product::create($product);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $title      = 'Detail Produk';
        $product    = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.products.show', compact('title', 'product', 'categories'));
    }

    public function edit(string $id)
    {
        $title      = 'Edit Produk';
        $product    = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.products.edit', compact('title', 'product', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        // Validate
        $request->validate([
            'name'          => 'required',
            'price'         => 'required|numeric',
            'description'   => 'required',
            'stock'         => 'required|numeric',
            'photo'         => 'image|mimes:jpeg,png,jpg|max:2048',
            'category_id'   => 'required|exists:categories,id',
        ]);

        // Get product
        $product = Product::findOrFail($id);

        // Check if photo is updated
        if ($request->hasFile('photo')) {

            // Delete old photo
            Storage::delete('public/products/' . $product->photo);

            // Upload new photo
            $photo = $request->file('photo');
            $photo->storeAs('public/products', $photo->hashName());

            $product->photo = $photo->hashName();
        }

        // Update product
        $product->name = $request->name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diubah');
    }

    public function destroy(string $id)
    {
        // Get product
        $product = Product::findOrFail($id);

        // Delete photo
        Storage::delete('public/products/' . $product->photo);

        // Delete product
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus');
    }
}
