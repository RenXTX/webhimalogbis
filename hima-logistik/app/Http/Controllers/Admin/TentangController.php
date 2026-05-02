<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tentang;

class TentangController extends Controller
{
    public function index()
    {
        $tentang = Tentang::firstOrCreate(
            ['id' => 1],
            [
                'sejarah' => "HIMA Logistik Bisnis berdiri sebagai wadah resmi bagi mahasiswa Jurusan Logistik Bisnis.\nDidirikan dengan semangat untuk menghimpun, mengembangkan, dan memberdayakan seluruh mahasiswa agar menjadi individu yang kompeten, berkarakter, dan berdaya saing tinggi.\n\nSejak awal berdiri, HIMA Logistik Bisnis telah menjalankan berbagai program kerja yang meliputi pengembangan akademik, soft skills, kepemimpinan, dan sosial kemasyarakatan.\n\nDengan semangat kebersamaan dan profesionalisme, kami terus berkomitmen untuk memberikan kontribusi terbaik bagi mahasiswa dan institusi.",
                'visi' => "Menjadi himpunan mahasiswa yang unggul, inovatif, dan berdaya saing dalam bidang logistik bisnis serta mampu berkontribusi nyata bagi masyarakat dan dunia industri.",
                'misi' => "Menyelenggarakan kegiatan akademik dan non-akademik yang berkualitas\nMengembangkan potensi dan kreativitas mahasiswa di bidang logistik bisnis\nMembangun karakter mahasiswa yang jujur, bertanggung jawab, dan profesional\nMenjalin sinergi dengan stakeholder industri dan dunia kerja\nMenciptakan lingkungan organisasi yang inklusif dan demokratis",
            ]
        );

        return view('admin.tentang.index', compact('tentang'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'sejarah' => 'required|string',
            'visi'    => 'required|string',
            'misi'    => 'required|string',
        ]);

        $tentang = Tentang::first();
        $tentang->update($request->only(['sejarah', 'visi', 'misi']));

        return redirect()->route('admin.tentang.index')->with('success', 'Konten Tentang Kami berhasil diperbarui!');
    }
}
