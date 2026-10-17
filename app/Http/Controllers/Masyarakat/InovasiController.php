<?php

namespace App\Http\Controllers\Masyarakat;

use App\Http\Controllers\Controller;
use App\Models\InovasiMasyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InovasiController extends Controller
{
    public function index()
    {
        $inovasiMasyarakat = InovasiMasyarakat::where('user_id', auth()->id())->latest()->paginate(10);

        return view('masyarakat.inovasi.index', compact('inovasiMasyarakat'));
    }

    public function create()
    {
        return view('masyarakat.inovasi.create');
    }

    public function store(Request $request)
    {
        // 1. Tampung hasil validasi ke dalam variabel $validatedData
        $validatedData = $request->validate([
            'nama_inovasi'   => 'required|max:255',
            'nama_inisiator' => 'required|max:255',
            'kategori'       => 'required|string',
            'asal_instansi'  => 'nullable',
            'hp'             => 'required|max:14',
            'ktp'            => 'required|max:16',
            'skd'            => 'nullable|file|mimes:pdf|max:2048',
            'bentuk'         => 'required',
            'tahapan'        => 'required',
            'jenis'          => 'required',
            'waktu_ujicoba'  => 'required|date',
            'waktu_penerapan' => 'required|date',
            'rancang_bangun' => 'required',
            'tujuan'         => 'required',
            'manfaat'        => 'required',
            'hasil'          => 'required',
            'penghargaan'    => 'nullable|file|mimes:pdf|max:2048', // tambahkan validasi tipe file
            'tahun'          => 'required',

            // Indikator
            'kemudahan_proses'   => 'required',
            'keterlibatan_aktor' => 'required',
            'sosialisasi'        => 'required',
            'sosialisasi_upload' => 'required|file|mimes:pdf|max:2048', // tambahkan validasi tipe file
            'kemanfaatan'        => 'required',
            'kemanfaatan_upload' => 'required|file|mimes:pdf|max:2048', // tambahkan validasi tipe file
            'kualitas_video'     => 'required',
        ]);

        // 2. Logika Upload File
        $fileFields = [
            'skd'                => 'skd',
            'penghargaan'        => 'penghargaan',
            'sosialisasi_upload' => 'sosialisasi',
            'kemanfaatan_upload' => 'kemanfaatan',
        ];

        foreach ($fileFields as $field => $folder) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = time() . '_' . $file->getClientOriginalName();
                $validatedData[$field] = $file->storeAs($folder, $filename, 'public');
            }
        }

        // 3. Gunakan $validatedData (bukan $request->all()) untuk menyimpan ke database
        InovasiMasyarakat::create($validatedData);

        return redirect()->route('inovasi.masyarakat.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(InovasiMasyarakat $inovasiMasyarakat)
    {
        return view('masyarakat.inovasi.edit', compact('inovasiMasyarakat'));
    }

    public function update(Request $request, InovasiMasyarakat $inovasiMasyarakat)
    {
        // 1. Validasi input (File dibuat nullable agar tidak wajib diunggah ulang)
        $validatedData = $request->validate([
            'nama_inovasi'       => 'required|max:255',
            'nama_inisiator'     => 'required|max:255',
            'kategori'           => 'nullable|string',
            'asal_instansi'      => 'nullable|string',
            'hp'                 => 'required|max:14',
            'ktp'                => 'required|max:16',
            'skd'                => 'nullable|file|mimes:pdf|max:2048',
            'bentuk'             => 'required',
            'tahapan'            => 'required',
            'jenis'              => 'required',
            'waktu_ujicoba'      => 'required|date',
            'waktu_penerapan'    => 'required|date',
            'rancang_bangun'     => 'required',
            'tujuan'             => 'required',
            'manfaat'            => 'required',
            'hasil'              => 'required',
            'penghargaan'        => 'nullable|file|mimes:pdf|max:2048',
            'tahun'              => 'required',

            // Indikator (diubah ke nullable)
            'kemudahan_proses'   => 'required',
            'keterlibatan_aktor' => 'required',
            'sosialisasi'        => 'required',
            'sosialisasi_upload' => 'nullable|file|mimes:pdf|max:2048',
            'kemanfaatan'        => 'required',
            'kemanfaatan_upload' => 'nullable|file|mimes:pdf|max:2048',
            'kualitas_video'     => 'required',
        ]);

        // 2. Pemrosesan file upload
        $fileFields = [
            'skd'                => 'skd',
            'penghargaan'        => 'penghargaan',
            'sosialisasi_upload' => 'sosialisasi',
            'kemanfaatan_upload' => 'kemanfaatan',
        ];

        foreach ($fileFields as $field => $folder) {
            if ($request->hasFile($field)) {
                // Hapus file lama jika ada di storage
                if ($inovasiMasyarakat->$field && Storage::disk('public')->exists($inovasiMasyarakat->$field)) {
                    Storage::disk('public')->delete($inovasiMasyarakat->$field);
                }

                // Simpan file baru
                $file = $request->file($field);
                $filename = time() . '_' . $file->getClientOriginalName();
                $validatedData[$field] = $file->storeAs($folder, $filename, 'public');
            } else {
                // PENTING: Hapus field dari array jika tidak ada file baru yang diunggah
                // agar data file lama di database tidak terhapus / tertimpa NULL
                unset($validatedData[$field]);
            }
        }

        // 3. Simpan perubahan ke database
        $inovasiMasyarakat->update($validatedData);

        return redirect()->route('inovasi.masyarakat.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(InovasiMasyarakat $inovasiMasyarakat)
    {
        // 1. Hapus File-file Terkait dari Storage
        if ($inovasiMasyarakat->skd && Storage::disk('public')->exists($inovasiMasyarakat->skd)) {
            Storage::disk('public')->delete($inovasiMasyarakat->skd);
        }
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
