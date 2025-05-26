<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gambar;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class KonversiController extends Controller
{
    public function showUpload()
    {
        $riwayat = Gambar::latest()->get();
        return view('upload', compact('riwayat'));
    }

    public function proses(Request $request)
    {
        $request->validate([
            'gambar' => 'required|image',
            'tipe' => 'required|in:grayscale,biner,negatif',
        ]);

        $file = $request->file('gambar');
        $tipe = $request->input('tipe');

        $namaFile = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $lokasi = public_path('gambar_asli');
        $file->move($lokasi, $namaFile);

        // Kirim ke Python
        $response = Http::attach(
            'gambar',
            fopen($lokasi . '/' . $namaFile, 'r'),
            $namaFile
        )->post("http://127.0.0.1:5000/$tipe");

        $hasilBase64 = $response->json('hasil');
        $hasilGambar = base64_decode($hasilBase64);

        // Simpan hasil ke public/gambar_hasil
        $hasilNamaFile = 'hasil_' . $namaFile;
        file_put_contents(public_path('gambar_hasil/' . $hasilNamaFile), $hasilGambar);

        // Simpan ke database
        Gambar::create([
            'nama_file' => $hasilNamaFile,
            'tipe_proses' => $tipe,
        ]);

        return redirect()->route('hasil', ['file' => $hasilNamaFile]);
    }

    public function hasil($file)
    {
        return view('hasil', compact('file'));
    }
}