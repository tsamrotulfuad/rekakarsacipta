<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = User::withCount('inovasi')->latest()->role('masyarakat')->paginate(10);
        return view('admin.user.index', compact('user'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        // Tampung hasil validasi ke dalam variabel $validatedData
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:unique',
            'password' => 'required',
        ]);

        // Gunakan $validatedData (bukan $request->all()) untuk menyimpan ke database
        User::create($validatedData);

        return redirect()->route('user.admin.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // 1. Validasi Input (File dijadikan 'nullable' agar tidak wajib diupload ulang saat edit)
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:unique',
            'password' => 'required',
        ]);

        // 5. Update Data Ke Database
        $user->update($validatedData);

        return redirect()->route('users.admin.index')->with('success', 'Data berhasil diubah.');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // Tolak penghapusan jika user masih memiliki data inovasi
        if ($user->inovasi()->exists()) {
            return redirect()->route('users.admin.index')
                ->with('error', 'User tidak dapat dihapus karena masih memiliki data inovasi.');
        }

        $user->delete();

        return redirect()->route('users.admin.index')
            ->with('success', 'Data user berhasil dihapus.');
    }
}
