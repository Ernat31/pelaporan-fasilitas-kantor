<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function auth()
    {
        $model = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $model->where('email', $email)->first();

        if ($user)
        {
            if ($password == $user['password'])
            {
               session()->set([
    'id_user' => $user['id_user'],
    'nama' => $user['nama'],
    'role' => $user['role'],
    'keahlian' => $user['keahlian'],
    'logged_in' => true
]);

                if($user['role'] == 'Karyawan')
                {
                    return redirect()->to('/dashboard-karyawan');
                }
                elseif($user['role'] == 'Admin Facility')
                {
                    return redirect()->to('/dashboard-admin');
                }
                elseif($user['role'] == 'Teknisi')
                {
                    return redirect()->to('/dashboard-teknisi');
                }
                elseif($user['role'] == 'Supervisor')
                {
                    return redirect()->to('/dashboard-supervisor');
                }
            }
        }

        return redirect()->to('/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}