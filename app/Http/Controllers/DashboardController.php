<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Kehadiran;

class DashboardController extends Controller
{
    public function index()
    {

        // Ambil data mahasiswa berdasarkan jenis kelamin
        $data_mahasiswa = [
            'laki' => Mahasiswa::where('jenis_kelamin', 'L')->count(),
            'perempuan' => Mahasiswa::where('jenis_kelamin', 'P')->count(),
        ];

        // Ambil data kehadiran mahasiswa
        $data_kehadiran = Kehadiran::selectRaw('kehadiran, COUNT(*) as count')
                                    ->groupBy('kehadiran')
                                    ->pluck('count', 'kehadiran')->toArray();

        // Data untuk chart (contoh data)
        $kehadiran_chart = [
            'Hadir' => $data_kehadiran['Hadir'] ?? 0,
            'Izin' => $data_kehadiran['Izin'] ?? 0,
            'Sakit' => $data_kehadiran['Sakit'] ?? 0,
            'Tanpa Keterangan' => $data_kehadiran['Tanpa Keterangan'] ?? 0,
        ];

        return view('dashboard', compact('data_mahasiswa', 'data_kehadiran', 'kehadiran_chart'));
    }
}
