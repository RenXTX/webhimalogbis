<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Struktur;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKegiatan = Kegiatan::count();
        $totalAnggota = Struktur::count();
        $kegiatanTerbaru = Kegiatan::latestEvent()->take(5)->get();

        return view('admin.dashboard', compact('totalKegiatan', 'totalAnggota', 'kegiatanTerbaru'));
    }
}
