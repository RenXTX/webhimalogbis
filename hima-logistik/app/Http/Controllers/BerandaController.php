<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $beranda = Beranda::active()->first();
        $kegiatanTerbaru = Kegiatan::latestEvent()->take(3)->get();

        return view('public.beranda', compact('beranda', 'kegiatanTerbaru'));
    }
}
