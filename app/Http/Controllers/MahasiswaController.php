<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\skbp;

class MahasiswaController extends Controller
{
public function dashboard()
{
    return view('mahasiswa.dashboard');
}

public function lapor(Request $request)
{
    // Validasi data yang dikirimkan dari formulir jika diperlukan
    $validatedData = $request->validate([
        'name' => 'required',
        'nim' => 'required',
        'email' => 'required|email',
        'nomor' => 'required',
        'fakultas' => 'required',
        'prodi' => 'required',
        'spp' => 'required|file',
        'ktm' => 'required|file',
    ]);

    // Simpan data ke dalam database menggunakan model Skbp
    $skbp = new Skbp;
    $skbp->name = $request->input('name');
    $skbp->nim = $request->input('nim');
    $skbp->email = $request->input('email');
    $skbp->nomor_wa = $request->input('nomor');
    $skbp->fakultas = $request->input('fakultas');
    $skbp->prodi = $request->input('prodi');
    
    // Lakukan pemrosesan dan penyimpanan file SPP dan KTM di sini

    $skbp->save();

    // Redirect ke halaman yang sesuai setelah penyimpanan data
    return redirect()->route('mahasiswa.lapor');
}

public function riwayat()
{
    return view('riwayat');
}

}