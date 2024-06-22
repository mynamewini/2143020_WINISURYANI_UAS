<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Pengaturan';
        $settings = Setting::all()->first();

        return view('admin.settings.index', compact('title', 'settings'));
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $title = 'Edit Pengaturan';
        $setting = Setting::find($id);

        return view('admin.settings.edit', compact('title', 'setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'site_name' => 'required',
            'site_description' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'maps' => 'required',
            'payment' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'tiktok' => 'required',
        ]);

        $setting = Setting::find($id);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logo->storeAs('public/settings', $logo);
        } else {
            $logo = $setting->logo;
        }

        $setting->update([
            'site_name' => $request->site_name,
            'site_description' => $request->site_description,
            'email' => $request->email,
            'phone' => $request->phone,

            'address' => $request->address,
            'maps' => $request->maps,
            'payment' => $request->payment,

            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'tiktok' => $request->tiktok,

            'logo' => $logo,
        ]);

        return redirect()->route('admin.settings.index')->with('success', 'Pengaturan Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
