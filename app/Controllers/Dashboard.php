<?php

namespace App\Controllers;

use App\Models\LaporanModel;

class Dashboard extends BaseController
{
   public function admin()
{
    $model = new \App\Models\LaporanModel();

    $data['total'] = $model->countAll();

    $data['menunggu'] = $model
        ->where('status_laporan','Menunggu Verifikasi')
        ->countAllResults();

    $data['disetujui'] = $model
        ->where('status_laporan','Disetujui')
        ->countAllResults();

    $data['proses'] = $model
        ->where('status_laporan','Dalam Perbaikan')
        ->countAllResults();

    $data['selesai'] = $model
        ->where('status_laporan','Selesai')
        ->countAllResults();

    return view('dashboard_admin',$data);
}

public function simulasiReminder()
{
    $model = new \App\Models\LaporanModel();

    $model->where('status_laporan', 'Disetujui')
          ->set([
              'reminder_admin' => 'Laporan telah ditugaskan kepada Anda dan belum ditindaklanjuti selama 1 jam. Mohon segera menerima dan mengerjakan tugas.'
          ])
          ->update();

    session()->setFlashdata(
        'success',
        '✅ Reminder berhasil dikirim ke Teknisi.'
    );

    return redirect()->to('/dashboard-admin');
}
   public function karyawan()
{
    $model = new \App\Models\LaporanModel();

    $data['laporan'] = $model
        ->where('id_user', session()->get('id_user'))
        ->findAll();

    return view('dashboard_karyawan', $data);
}
    public function teknisi()
    {
        $model = new LaporanModel();

        $data['tugas'] = $model
            ->where('id_teknisi', session()->get('id_user'))
            ->findAll();

        return view('dashboard_teknisi', $data);
    }

    public function supervisor()
{
    $model = new \App\Models\LaporanModel();

    $data['laporan'] = $model
        ->where('eskalasi', 'Eskalasi Supervisor')
        ->findAll();

    $data['total'] = $model
        ->where('eskalasi', 'Eskalasi Supervisor')
        ->countAllResults();

    $data['belum'] = $model
        ->where('status_eskalasi', 'Belum Ditindaklanjuti')
        ->countAllResults();

    $data['sudah'] = $model
        ->where('status_eskalasi', 'Ditindaklanjuti')
        ->countAllResults();

    return view('dashboard_supervisor', $data);
}

    public function terimaTugas($id)
    {
        $model = new LaporanModel();

        $model->update($id, [
            'status_laporan' => 'Diterima'
        ]);

        return redirect()->to('/dashboard-teknisi');
    }

    public function dalamPerbaikan($id)
    {
        $model = new LaporanModel();

        $model->update($id, [
            'status_laporan' => 'Dalam Perbaikan'
        ]);

        return redirect()->to('/dashboard-teknisi');
    }

    public function selesaiTugas($id)
    {
        $model = new LaporanModel();

        $model->update($id, [
            'status_laporan' => 'Selesai'
        ]);

        return redirect()->to('/dashboard-teknisi');
    }
    
    
    public function formHasil($id)
{
    $model = new \App\Models\LaporanModel();

    $data['laporan'] = $model->find($id);

    return view('hasil_perbaikan', $data);
}

public function simpanHasil($id)
{
    $model = new \App\Models\LaporanModel();

    $foto = $this->request->getFile('foto_hasil');

    $namaFoto = '';

    if($foto->isValid() && !$foto->hasMoved()){

        $namaFoto = $foto->getRandomName();

        $foto->move('uploads/', $namaFoto);

    }

    $model->update($id,[

        'foto_hasil'=>$namaFoto,

        'catatan_perbaikan'=>$this->request->getPost('catatan_perbaikan'),

        'status_laporan' => 'Menunggu Pemeriksaan Admin'
    ]);

    return redirect()->to('/dashboard-teknisi');
}
    


    public function formFollowUp($id)
{
    $model = new \App\Models\LaporanModel();

    $data['laporan'] = $model->find($id);

    return view('followup_supervisor', $data);
}

public function simpanFollowUp($id)
{
    $model = new \App\Models\LaporanModel();

    $model->update($id, [

        'arahan_supervisor' => $this->request->getPost('arahan_supervisor'),

        'status_eskalasi' => 'Ditindaklanjuti'

    ]);

    return redirect()->to('/dashboard-supervisor');
}

public function pemeriksaan($id)
{
    $model = new \App\Models\LaporanModel();

    $data['laporan'] = $model->find($id);

    return view('pemeriksaan_hasil', $data);
}

public function tutupLaporan($id)
{
    $model = new \App\Models\LaporanModel();

    $model->update($id,[
        'status_laporan' => 'Selesai'
    ]);

    return redirect()->to('/dashboard-admin');
}
public function simulasiEskalasi()
{
    $model = new \App\Models\LaporanModel();

    $model->where('status_laporan', 'Disetujui')
          ->set([
              'eskalasi' => 'Eskalasi Supervisor',
              'status_eskalasi' => 'Belum Ditindaklanjuti'
          ])
          ->update();

    session()->setFlashdata(
        'success',
        '🚨 Laporan berhasil dieskalasikan ke Supervisor.'
    );

    return redirect()->to('/dashboard-admin');
}
public function laporanAdmin()
{
    $model = new \App\Models\LaporanModel();

    $data['laporan'] = $model
        ->orderBy('id_laporan', 'DESC')
        ->findAll();

    return view('laporan_admin', $data);
}
}