<?php

namespace App\Http\Controllers\Admin\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Admin\InovasiMasyarakat;
use Illuminate\Http\Request;

class InovasiController extends Controller
{
    public function index()
    {
        $InovasiMasyarakat = InovasiMasyarakat::latest()->paginate(10);

        return view('admin.inovasi.index', compact('InovasiMasyarakat'));
    }

    public function create()
    {
        return view('admin.inovasi.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama_inovasi'   => 'required|max:255',
            'nama_inisiator' => 'required|max:255',
            'hp'             => 'required|max:14',
            'ktp'            => 'required|max:16',
            'bentuk'         => 'required',
            'tahapan'        => 'required',
            'jenis'          => 'required',
            'waktu_ujicoba'  => 'required|date',
            'waktu_penerapan'  => 'required|date',
            'rancang_bangun'   => 'required',
            'tujuan'         => 'required',
            'manfaat'        => 'required',
            'hasil'          => 'required',
            'penghargaan'    => 'nullable',
            'tahun'          => 'required',

            // Indikator
            'kemudahan_proses'   => 'required',
            'keterlibatan_aktor' => 'required',
            'sosialisasi'        => 'required',
            'sosialisasi_upload' => 'required',
            'kemanfaatan'        => 'required',
            'kemanfaatan_upload' => 'required',
            'kualitas_video'     => 'required',
        ]);

        // Logika Upload File
        if ($request->hasFile('penghargaan')) {
            $file = $request->file('penghargaan');

            // Mendapatkan nama asli file
            $originalName = $file->getClientOriginalName();

            // Menyimpan ke folder 'public/penghargaans'
            $data['penghargaan'] = $file->storeAs('penghargaan', $originalName, 'public');
        }

        if ($request->hasFile('sosialisasi_upload')) {
            $file = $request->file('sosialisasi_upload');

            // Mendapatkan nama asli file
            $originalName = $file->getClientOriginalName();

            // Menyimpan ke folder 'public/penghargaans'
            $data['sosialisasi_upload'] = $file->storeAs('sosialisasi', $originalName, 'public');
        }
        if ($request->hasFile('kemanfaatan_upload')) {
            $file = $request->file('kemanfaatan_upload');

            // Mendapatkan nama asli file
            $originalName = $file->getClientOriginalName();

            // Menyimpan ke folder 'public/penghargaans'
            $data['kemanfaatan_upload'] = $file->storeAs('kemanfaatan', $originalName, 'public');
        }

        InovasiMasyarakat::create($request->all()); // Model Admin/InovasiMasyarat
        return redirect()->route('inovasi.masyarakat.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(InovasiMasyarakat $inovasiMasyarakat) 
    {
        return view('posts.edit', compact('post'));
    }

    // public function update(Request $request, Post $post) {
    //     $request->validate([
    //         'title' => 'required|max:255',
    //         'content' => 'required',
    //     ]);
    //     $post->update($request->all());
    //     return redirect()->route('posts.index')->with('success', 'Data berhasil diubah.');
    // }

    // public function destroy(Post $post) {
    //     $post->delete();
    //     return redirect()->route('posts.index')->with('success', 'Data berhasil dihapus.');
    // }

}
