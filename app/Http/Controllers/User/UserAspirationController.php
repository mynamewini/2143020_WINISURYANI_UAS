<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aspiration;

class UserAspirationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Keluhan Pelanggan';
        $aspirations = Aspiration::where('user_id', auth()->user()->id)->get();

        return view('user.aspirations.index', compact('title', 'aspirations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Tambah Keluhan';

        return view('user.aspirations.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'phone'         => 'required|numeric',
            'address'       => 'required',
            'email'         => 'required|email',
            'aspiration'    => 'required',
        ]);

        Aspiration::create([
            'user_id'       => auth()->user()->id,
            'name'          => $request->name,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'email'         => $request->email,
            'aspiration'    => $request->aspiration,
        ]);

        return redirect()->route('aspirations.index')->with('success', 'Keluhan berhasil terkirim');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $title = 'Detail Keluhan';
        $aspiration = Aspiration::findOrFail($id);

        return view('user.aspirations.show', compact('title', 'aspiration'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Ambil data keluhan
        $aspiration = Aspiration::findOrFail($id);

        // Hapus data keluhan
        $aspiration->delete();

        return redirect()->route('aspirations.index')->with('success', 'Keluhan berhasil dihapus');
    }
}
