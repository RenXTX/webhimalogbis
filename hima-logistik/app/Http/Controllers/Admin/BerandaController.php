<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Beranda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BerandaController extends Controller
{
    public function index()
    {
        $berandas = Beranda::latest()->get();
        return view('admin.beranda.index', compact('berandas'));
    }

    public function create()
    {
        return view('admin.beranda.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'subtitle'     => 'nullable|string',
            'description'  => 'nullable|string',
            'welcome_text' => 'nullable|string',
            'hero_image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'is_active'    => 'boolean',
            'stat_anggota' => 'nullable|string|max:50',
            'stat_kegiatan'=> 'nullable|string|max:50',
            'stat_divisi'  => 'nullable|string|max:50',
            'stat_periode' => 'nullable|string|max:50',
        ]);

        if ($request->hasFile('hero_image')) {
            $validated['hero_image'] = $request->file('hero_image')->store('beranda', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        Beranda::create($validated);

        return redirect()->route('admin.beranda.index')->with('success', 'Konten beranda berhasil ditambahkan!');
    }

    public function edit(Beranda $beranda)
    {
        return view('admin.beranda.edit', compact('beranda'));
    }

    public function update(Request $request, Beranda $beranda)
    {
        $validated = $request->validate([
            'title'        => 'required|string|max:255',
            'subtitle'     => 'nullable|string',
            'description'  => 'nullable|string',
            'welcome_text' => 'nullable|string',
            'hero_image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:3072',
            'is_active'    => 'boolean',
            'stat_anggota' => 'nullable|string|max:50',
            'stat_kegiatan'=> 'nullable|string|max:50',
            'stat_divisi'  => 'nullable|string|max:50',
            'stat_periode' => 'nullable|string|max:50',
        ]);

        if ($request->hasFile('hero_image')) {
            // Hapus gambar lama jika ada
            if ($beranda->hero_image) {
                Storage::disk('public')->delete($beranda->hero_image);
            }
            $validated['hero_image'] = $request->file('hero_image')->store('beranda', 'public');
        }

        $validated['is_active'] = $request->has('is_active');

        $beranda->update($validated);

        return redirect()->route('admin.beranda.index')->with('success', 'Konten beranda berhasil diperbarui!');
    }

    public function destroy(Beranda $beranda)
    {
        if ($beranda->hero_image) {
            Storage::disk('public')->delete($beranda->hero_image);
        }

        $beranda->delete();

        return redirect()->route('admin.beranda.index')->with('success', 'Konten beranda berhasil dihapus!');
    }
}
