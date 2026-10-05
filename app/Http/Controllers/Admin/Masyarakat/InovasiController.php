<?php

namespace App\Http\Controllers\Admin\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\Admin\InovasiMasyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InovasiController extends Controller
{
    public function index()
    {
        $inovasiMasyarakat = InovasiMasyarakat::latest()->paginate(10);

        return view('admin.inovasi.index', compact('inovasiMasyarakat'));
    }

    public function create()
    {
        return view('admin.inovasi.create');
    }

    public function store(Request $request)
    {
        // 1. Tampung hasil validasi ke dalam variabel $validatedData
        $validatedData = $request->validate([
            'nama_inovasi' => 'required|max:255',
            'nama_inisiator' => 'required|max:255',
            'hp' => 'required|max:14',
            'ktp' => 'required|max:16',
            'bentuk' => 'required',
            'tahapan' => 'required',
            'jenis' => 'required',
            'waktu_ujicoba' => 'required|date',
            'waktu_penerapan' => 'required|date',
            'rancang_bangun' => 'required',
            'tujuan' => 'required',
            'manfaat' => 'required',
            'hasil' => 'required',
            'penghargaan' => 'nullable|file', // tambahkan validasi tipe file
            'tahun' => 'required',

            // Indikator
            'kemudahan_proses' => 'required',
            'keterlibatan_aktor' => 'required',
            'sosialisasi' => 'required',
            'sosialisasi_upload' => 'required|file', // tambahkan validasi tipe file
            'kemanfaatan' => 'required',
            'kemanfaatan_upload' => 'required|file', // tambahkan validasi tipe file
            'kualitas_video' => 'required',
        ]);

        // 2. Logika Upload File
        if ($request->hasFile('penghargaan')) {
            $file = $request->file('penghargaan');
            // Tambahkan time() agar nama file unik dan tidak rentan tertimpa
            $filename = time().'_'.$file->getClientOriginalName();
            // Simpan path ke dalam $validatedData
            $validatedData['penghargaan'] = $file->storeAs('penghargaan', $filename, 'public');
        }

        if ($request->hasFile('sosialisasi_upload')) {
            $file = $request->file('sosialisasi_upload');
            $filename = time().'_'.$file->getClientOriginalName();
            $validatedData['sosialisasi_upload'] = $file->storeAs('sosialisasi', $filename, 'public');
        }

        if ($request->hasFile('kemanfaatan_upload')) {
            $file = $request->file('kemanfaatan_upload');
            $filename = time().'_'.$file->getClientOriginalName();
            $validatedData['kemanfaatan_upload'] = $file->storeAs('kemanfaatan', $filename, 'public');
        }

        // 3. Gunakan $validatedData (bukan $request->all()) untuk menyimpan ke database
        InovasiMasyarakat::create($validatedData);

        return redirect()->route('inovasi.masyarakat.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(string $id)
    {
        $inovasiMasyarakat = InovasiMasyarakat::findOrFail($id);

        return view('admin.inovasi.edit', compact('inovasiMasyarakat'));
    }

    public function update(Request $request, string $id)
    {
        $inovasiMasyarakat = InovasiMasyarakat::findOrFail($id);

        // 1. Validasi Input (File dijadikan 'nullable' agar tidak wajib diupload ulang saat edit)
        $validatedData = $request->validate([
            'nama_inovasi'      => 'required|max:255',
            'nama_inisiator'    => 'required|max:255',
            'hp'                => 'required|max:14',
            'ktp'               => 'required|max:16',
            'bentuk'            => 'required',
            'tahapan'           => 'required',
            'jenis'             => 'required',
            'waktu_ujicoba'     => 'required|date',
            'waktu_penerapan'   => 'required|date',
            'rancang_bangun'    => 'required',
            'tujuan'            => 'required',
            'manfaat'           => 'required',
            'hasil'             => 'required',
            'penghargaan'       => 'nullable|file',
            'tahun'             => 'required',

            // Indikator
            'kemudahan_proses'  => 'required',
            'keterlibatan_aktor'=> 'required',
            'sosialisasi'       => 'required',
            'sosialisasi_upload'=> 'nullable|file',
            'kemanfaatan'       => 'required',
            'kemanfaatan_upload'=> 'nullable|file',
            'kualitas_video'    => 'required',
        ]);

        // 2. Logika Update File Penghargaan
        if ($request->hasFile('penghargaan')) {
            // Hapus file lama jika ada
            if ($inovasiMasyarakat->penghargaan && Storage::disk('public')->exists($inovasiMasyarakat->penghargaan)) {
                Storage::disk('public')->delete($inovasiMasyarakat->penghargaan);
            }
            $file = $request->file('penghargaan');
            $filename = time().'_'.$file->getClientOriginalName();
            $validatedData['penghargaan'] = $file->storeAs('penghargaan', $filename, 'public');
        }

        // 3. Logika Update File Sosialisasi
        if ($request->hasFile('sosialisasi_upload')) {
            if ($inovasiMasyarakat->sosialisasi_upload && Storage::disk('public')->exists($inovasiMasyarakat->sosialisasi_upload)) {
                Storage::disk('public')->delete($inovasiMasyarakat->sosialisasi_upload);
            }
            $file = $request->file('sosialisasi_upload');
            $filename = time().'_'.$file->getClientOriginalName();
            $validatedData['sosialisasi_upload'] = $file->storeAs('sosialisasi', $filename, 'public');
        }

        // 4. Logika Update File Kemanfaatan
        if ($request->hasFile('kemanfaatan_upload')) {
            if ($inovasiMasyarakat->kemanfaatan_upload && Storage::disk('public')->exists($inovasiMasyarakat->kemanfaatan_upload)) {
                Storage::disk('public')->delete($inovasiMasyarakat->kemanfaatan_upload);
            }
            $file = $request->file('kemanfaatan_upload');
            $filename = time().'_'.$file->getClientOriginalName();
            $validatedData['kemanfaatan_upload'] = $file->storeAs('kemanfaatan', $filename, 'public');
        }

        // 5. Update Data Ke Database
        $inovasiMasyarakat->update($validatedData);

        return redirect()->route('inovasi.masyarakat.index')->with('success', 'Data berhasil diubah.');
    }

    public function destroy(string $id)
    {
        $inovasiMasyarakat = InovasiMasyarakat::findOrFail($id);
        // 1. Hapus File-file Terkait dari Storage
        if ($inovasiMasyarakat->penghargaan && Storage::disk('public')->exists($inovasiMasyarakat->penghargaan)) {
            Storage::disk('public')->delete($inovasiMasyarakat->penghargaan);
        }
        if ($inovasiMasyarakat->sosialisasi_upload && Storage::disk('public')->exists($inovasiMasyarakat->sosialisasi_upload)) {
            Storage::disk('public')->delete($inovasiMasyarakat->sosialisasi_upload);
        }
        if ($inovasiMasyarakat->kemanfaatan_upload && Storage::disk('public')->exists($inovasiMasyarakat->kemanfaatan_upload)) {
            Storage::disk('public')->delete($inovasiMasyarakat->kemanfaatan_upload);
        }

        // 2. Hapus Record dari Database
        $inovasiMasyarakat->delete();

        return redirect()->route('inovasi.masyarakat.index')->with('success', 'Data berhasil dihapus.');
    }
}
