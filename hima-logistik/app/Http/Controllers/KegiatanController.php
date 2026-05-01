<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index(Request $request)
    {
        $query = Kegiatan::latestEvent();

        // Filter berdasarkan kategori
        if ($request->filled('kategori')) {
            $query->where('category', $request->kategori);
        }

        $kegiatan = $query->paginate(9)->withQueryString();
        $categories = Kegiatan::distinct()->orderBy('category')->pluck('category');

        return view('public.kegiatan.index', compact('kegiatan', 'categories'));
    }

    public function show(Kegiatan $kegiatan)
    {
        $kegiatanLain = Kegiatan::latestEvent()
            ->where('id', '!=', $kegiatan->id)
            ->take(3)
            ->get();

        return view('public.kegiatan.show', compact('kegiatan', 'kegiatanLain'));
    }
}
