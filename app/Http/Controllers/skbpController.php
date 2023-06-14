<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\skbp;

class skbpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $skbps = Skbp::all(); // Mengambil semua data dari tabel "skbps"
        return view('admin.list', ['skbps' => $skbps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function validasi(Request $request)
    {
    $selectedSkbp = null;

    // Tangkap input yang dikirimkan melalui form
    if ($request->has('selected_skbp_id')) {
        $selectedSkbpId = $request->input('selected_skbp_id');
        $selectedSkbp = Skbp::find($selectedSkbpId);
    }

    $skbps = Skbp::all();
    return view('admin.validasi', ['skbps' => $skbps, 'selectedSkbp' => $selectedSkbp]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function lapor()
    {
        return view('mahasiswa.lapor');
    }
    


    public function upload(Request $request)
{
    // Validasi data yang dikirimkan dari formulir jika diperlukan
    $validatedData = $request->validate([
        'nama' => 'required|string',
        'email' => 'required|email',
        'nomor_wa' => 'required|string',
        'fakultas' => 'required|string',
        'prodi' => 'required|string',
        'ktm' => 'required|file',
        'spp' => 'required|file',
    ]);
    $ktmPath = $request->file('ktm')->store('ktm');
    $sppPath = $request->file('spp')->store('spp');
    // Simpan data ke dalam database menggunakan model Skbp
    $skbp = new Skbp();
    $skbp->nama = $validatedData['nama'];
    $skbp->email = $validatedData['email'];
    $skbp->nomor_wa = $validatedData['nomor_wa'];
    $skbp->fakultas = $validatedData['fakultas'];
    $skbp->prodi = $validatedData['prodi'];
    $skbp->ktm = $ktmPath;
    $skbp->spp = $sppPath;
    $skbp->save();

    return redirect()->route('mahasiswa.riwayat')->with('success', 'Data SKBP berhasil disimpan.');
    // Redirect ke halaman yang sesuai setelah penyimpanan data
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function riwayat()
    {
        $skbps = Skbp::all(); // Mengambil semua data dari tabel "skbps"
        return view('mahasiswa.riwayat', ['skbps' => $skbps]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function download($id, $file)
     {
         $skbp = SKBP::findOrFail($id);
     
         // Periksa jenis file yang ingin diunduh (spp atau ktm)
         $fileName = ($file === 'spp') ? $skbp->spp : $skbp->ktm;
     
         // Periksa apakah file ada
         if (!is_null($fileName)) {
             // Ambil konten file
             $fileContents = Storage::disk('public')->get($fileName);
     
             // Tentukan nama file saat diunduh
             $downloadFileName = ($file === 'spp') ? 'SPP' : 'KTM';
     
             // Mengatur header respons
             $headers = [
                 'Content-Type' => 'application/octet-stream',
                 'Content-Disposition' => 'attachment; filename="' . $downloadFileName . '"',
             ];
     
             // Mengembalikan respons dengan file yang diunduh
             return response($fileContents, 200, $headers);
         }
     
         // Jika file tidak ada, kembalikan respons dengan pesan "File Tidak Ada"
         return back()->with('message', 'File Tidak Ada');
     }
    
     public function status(Request $request)
{
    $id = $request->input('id');
    $status = $request->input('status');

    $skbp = SKBP::findOrFail($id);
    $skbp->status = $status;

    if ($status === 'rejected') {
        $message = 'SKBP ditolak.';
    } elseif ($status === 'accepted') {
        $message = 'SKBP diterima.';
    } else {
        $message = 'Status SKBP diubah.';
    }
    $skbp->save();

    return redirect()->route('admin.validasi')->with('message', $message);
}



    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
