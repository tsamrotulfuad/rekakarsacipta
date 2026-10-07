<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class InovasiMasyarakat extends Model
{
    protected $fillable = [
        'nama_inovasi',
        'nama_inisiator',
        'hp',
        'ktp',
        'bentuk',
        'tahapan',
        'jenis',
        'waktu_ujicoba',
        'waktu_penerapan',
        'rancang_bangun',
        'tujuan',
        'manfaat',
        'hasil',
        'penghargaan',
        'tahun',
        'kemudahan_proses',
        'keterlibatan_aktor',
        'sosialisasi',
        'sosialisasi_upload',
        'kemanfaatan',
        'kemanfaatan_upload',
        'kualitas_video',
    ];

    protected static function boot()
    {
        parent::boot();

        // Automatically generate a UUID when a new record is being created
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::orderedUuid(); //
            }
        });

        static::creating(function ($model) {
        if (Auth::check()) {
            $model->user_id = Auth::id();
            }
        });
    }
}
