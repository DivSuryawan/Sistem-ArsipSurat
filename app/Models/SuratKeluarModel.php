<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluarModel extends Model
{
    use HasFactory;
    protected $table = 'surat_keluar';
    protected $fillable = [
        'id',
        'no_surat',
        'tgl_keluar',
        'perihal',
        'sifat',
        'lampiran',
        'instansi_id',
        'user_id',
        'file_surat',
        'created_at',
        'updated_at'
    ];
    public function user_rol()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
