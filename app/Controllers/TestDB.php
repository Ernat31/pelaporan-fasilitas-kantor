<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class TestDB extends Controller
{
    public function index()
    {
        $db = Database::connect();

        if ($db) {
            echo "Koneksi database berhasil!";
        } else {
            echo "Koneksi database gagal!";
        }
    }
}