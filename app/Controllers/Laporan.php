<?php

namespace App\Controllers;

use App\Models\LaporanModel;

class Laporan extends BaseController

{
    public function index()
    {
        return view('laporan');
    }

   public function simpan()
{
    $model = new LaporanModel();

    $foto = $this->request->getFile('foto_kerusakan');

    $namaFoto = '';

    if ($foto && $foto->isValid() && !$foto->hasMoved()) {

        $namaFoto = $foto->getRandomName();

        $foto->move(FCPATH . 'uploads', $namaFoto);

    }

    $model->save([
        'id_user'               => session()->get('id_user'),
        'nama_fasilitas'        => $this->request->getPost('nama_fasilitas'),
        'lokasi'                => $this->request->getPost('lokasi'),
        'jenis_kerusakan'       => $this->request->getPost('jenis_kerusakan'),
        'deskripsi_kerusakan'   => $this->request->getPost('deskripsi_kerusakan'),
        'foto_kerusakan'        => $namaFoto,
        'status_laporan'        => 'Menunggu Verifikasi',
        'id_teknisi'            => null
    ]);

    return view('laporan_berhasil');
}

    public function data()
    {
        $model = new LaporanModel();

        $data['laporan'] = $model->findAll();

        return view('data_laporan', $data);
    }

    public function approve($id)
    {
        $model = new LaporanModel();

        $model->update($id, [
            'status_laporan' => 'Disetujui'
        ]);
return redirect()->to('/penugasan/'.$id);
    }

    public function tolak($id)
    {
        $model = new LaporanModel();

        $model->update($id, [
            'status_laporan' => 'Ditolak'
        ]);

        return redirect()->to('/data-laporan');
    }

    

   
    public function penugasan($id)
{
    $model = new LaporanModel();

    $data['laporan'] = $model->find($id);

    return view('penugasan_teknisi', $data);
}

 public function simpanPenugasan($id)
{
    $model = new LaporanModel();

    $teknisi = $this->request->getPost('teknisi');

    if($teknisi == 'Andi'){
        $id_teknisi = 3;
    }
    elseif($teknisi == 'Rian'){
        $id_teknisi = 4;
    }
    else{
        $id_teknisi = null;
    }

    $model->update($id,[
        'id_teknisi' => $id_teknisi,
        'nama_teknisi' => $teknisi
    ]);
    return redirect()->to('/dashboard-admin');
}   
}

