<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;
    protected $table = 'surat_masuk';
    protected $primaryKey ='id_surat_masuk';
    protected $fillable = [
        'nomor_surat',
        'pengirim',
        'tanggal_surat',
        'perihal',
        'ringkasan',
        'file_path',
    ];
}
