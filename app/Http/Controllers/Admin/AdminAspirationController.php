<?php

namespace App\Http\Controllers\Admin;

use App\Models\Aspiration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminAspirationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Keluhan Pelanggan';
        $aspirations = Aspiration::latest()->get();

        return view('admin.aspiration.index', compact('title', 'aspirations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create Aspiration';

        return view('admin.aspiration.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'aspiration' => 'required|string',
            'status' => 'required|string|in:pending,approved,rejected',
            'reply' => 'nullable|string',
            'user_id' => 'nullable|exists:users,id',
        ]);

        // Simpan data ke database
        Aspiration::create($request->all());

        // Redirect to the aspiration index
        return redirect()->route('admin.aspirations.index')->with('success', 'Keluhan berhasil dikirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'Detail Keluhan';
        $aspiration = Aspiration::findOrFail($id);

        return view('admin.aspiration.show', compact('title', 'aspiration'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Balas Keluhan';
        $aspiration = Aspiration::findOrFail($id);

        return view('admin.aspiration.edit', compact('title', 'aspiration'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate the form data
        $request->validate([
            'status'    => 'required|string|in:pending,approved,rejected',
            'reply'     => 'nullable|string',
            'user_id'   => 'nullable|exists:users,id',
            'updated_at' => 'nullable|date_format:Y-m-d H:i:s',
        ]);

        // Update data ke database
        Aspiration::findOrFail($id)->update($request->all());

        // Redirect to the aspiration index
        return redirect()->route('admin.aspirations.index')->with('success', 'Keluhan berhasil dibalas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus data dari database
        Aspiration::findOrFail($id)->delete();

        // Redirect to the aspiration index
        return redirect()->route('admin.aspirations.index')->with('success', 'Keluhan berhasil dihapus');
    }
}
