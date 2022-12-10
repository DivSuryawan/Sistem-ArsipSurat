<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasukModel extends Model
{
    use HasFactory;
    protected $table = 'surat_masuk';
    protected $fillable = [
        'id',
        'no_surat',
        'tgl_masuk',
        'perihal',
        'sifat',
        'lampiran',
        'alamat',
        'file_surat',
        'created_at',
        'updated_at'
    ];
}
