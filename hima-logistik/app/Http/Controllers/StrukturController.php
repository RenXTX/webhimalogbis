<?php

namespace App\Http\Controllers;

use App\Models\Struktur;
use Illuminate\Http\Request;

class StrukturController extends Controller
{
    public function index()
    {
        // Kelompokkan berdasarkan divisi, urutkan berdasarkan order
        $strukturs = Struktur::ordered()->get()->groupBy(function ($item) {
            return $item->division ?? 'Pengurus Inti';
        });

        return view('public.struktur', compact('strukturs'));
    }
}
