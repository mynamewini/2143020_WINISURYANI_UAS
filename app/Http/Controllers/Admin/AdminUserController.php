<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    // Admin User List
    public function admin()
    {
        $title  = 'Data Administrator';
        $users  = User::where('role', 'admin')->get();

        return view('admin.users.admin', compact('title', 'users'));
    }

    // Operator User List
    public function operator()
    {
        $title  = 'Data Operator';
        $users  = User::where('role', 'operator')->get();

        return view('admin.users.operator', compact('title', 'users'));
    }

    // User List
    public function user()
    {
        $title = 'Data Pelanggan';
        $users = User::where('role', 'user')->get();

        return view('admin.users.user', compact('title', 'users'));
    }

    // User Create
    public function create()
    {
        $title = 'Tambah Pengguna';

        return view('admin.users.pages.create', compact('title'));
    }

    // User Store
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'username' => 'required',
            'email'    => 'required|email',
            'phone'    => 'required|numeric',
            'role'     => 'required',

            // Password & Confirm Password
            'password' => 'required|min:6',

            // Password Confirmation
            'password_confirmation' => 'required|same:password',
        ]);

        // Simpan Password saja, tanpa konfirmasi password
        $request->merge([
            'password' => bcrypt($request->password),
        ]);

        // Simpan data ke database
        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'phone'    => $request->phone,
            'role'     => $request->role,
            'password' => $request->password,
        ]);

        // Rturn Back with Success Message
        return redirect()->route('admin.adminList')->with('success', 'Data pengguna berhasil ditambahkan.');
    }

    // User Detail
    public function show($id)
    {
        $title = 'Detail Pengguna';
        $user  = User::find($id);

        return view('admin.users.pages.show', compact('title', 'user'));
    }

    // User Edit
    public function edit($id)
    {
        $title = 'Edit Pengguna';
        $user  = User::find($id);

        return view('admin.users.pages.edit', compact('title', 'user'));
    }

    // User Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'     => 'required',
            'username' => 'required',
            'email'    => 'required|email',
            'phone'    => 'required|numeric',
            'role'     => 'required',
            'password' => 'nullable|min:6',
        ]);

        $user = User::find($id);
        $user->update($request->all());

        // Kembali ke Form dengan Pesan Sukses
        return redirect()->route('admin.users.edit', $id)->with('success', 'Data pengguna berhasil diubah.');
    }

    // User Delete
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('admin.adminList')->with('success', 'Data pengguna berhasil dihapus.');
    }

}
