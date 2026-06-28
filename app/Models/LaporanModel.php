<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id_laporan';

    protected $allowedFields = [

'id_user',

'nama_fasilitas',

'lokasi',

'jenis_kerusakan',

'deskripsi_kerusakan',

'foto_kerusakan',

'foto_hasil',

'catatan_perbaikan',

'status_laporan',

'id_teknisi',

'nama_teknisi',

'eskalasi',
'status_eskalasi',
'arahan_supervisor',
'reminder_admin',
];
}