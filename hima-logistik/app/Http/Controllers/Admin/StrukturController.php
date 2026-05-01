<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Struktur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturController extends Controller
{
    public function index()
    {
        $strukturs = Struktur::ordered()->get();
        return view('admin.struktur.index', compact('strukturs'));
    }

    public function create()
    {
        return view('admin.struktur.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'position'  => 'required|string|max:255',
            'division'  => 'nullable|string|max:255',
            'photo'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'instagram' => 'nullable|string|max:255',
            'order'     => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('struktur', 'public');
        }

        $validated['order'] = $request->input('order', 0);

        Struktur::create($validated);

        return redirect()->route('admin.struktur.index')->with('success', 'Anggota struktur berhasil ditambahkan!');
    }

    public function edit(Struktur $struktur)
    {
        return view('admin.struktur.edit', compact('struktur'));
    }

    public function update(Request $request, Struktur $struktur)
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'position'  => 'required|string|max:255',
            'division'  => 'nullable|string|max:255',
            'photo'     => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'instagram' => 'nullable|string|max:255',
            'order'     => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('photo')) {
            if ($struktur->photo) {
                Storage::disk('public')->delete($struktur->photo);
            }
            $validated['photo'] = $request->file('photo')->store('struktur', 'public');
        }

        $validated['order'] = $request->input('order', 0);

        $struktur->update($validated);

        return redirect()->route('admin.struktur.index')->with('success', 'Anggota struktur berhasil diperbarui!');
    }

    public function destroy(Struktur $struktur)
    {
        if ($struktur->photo) {
            Storage::disk('public')->delete($struktur->photo);
        }

        $struktur->delete();

        return redirect()->route('admin.struktur.index')->with('success', 'Anggota struktur berhasil dihapus!');
    }
}
