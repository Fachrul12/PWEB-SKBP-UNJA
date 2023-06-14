<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\skbp;

class DonwloadController extends Controller
{
    public function download($id, $type)
    {
        $skbp = Skbp::findOrFail($id);

        // Mendapatkan file dan tipe file yang ingin diunduh (misalnya, 'spp' atau 'ktm')
        $file = $skbp->spp; // Ganti 'spp' dengan kolom yang sesuai di tabel skbps
        $fileType = 'application/pdf'; // Ganti dengan tipe file yang sesuai
    
        // Set nama file asli saat mengunduh
        $fileName = 'nama_file_asli.pdf'; // Ganti dengan nama file yang sesuai
    
        // Memeriksa apakah file ada
        if ($file) {
            // Membaca file dari penyimpanan (misalnya, penyimpanan lokal atau penyimpanan awan seperti AWS S3)
            $fileContents = storage::disk('public')->get($file);
    
            // Menggunakan response untuk mengirim file ke browser
            return response()->streamDownload(function () use ($fileContents) {
                echo $fileContents;
            }, $fileName, ['Content-Type' => $fileType]);
        } else {
            // Jika file tidak ditemukan, kirimkan respons dengan pesan file tidak ada
            return response('File tidak ada', 404);
        }
    }
}
