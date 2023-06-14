<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $name = $request->input('tb_username');
        $password = $request->input('tb_password');

        // Memeriksa keberadaan pengguna dengan username dan password yang cocok
        $credentials = [
            'name' => $name,
            'password' => $password
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $role = $user->role;

            if ($role == "Admin") {
                // Arahkan ke halaman admin
                return redirect()->route('admin.dashboard');
            } else if ($role == "Mahasiswa") {
                // Arahkan ke halaman mahasiswa
                return redirect()->route('mahasiswa.dashboard');
            } else {
                // Role tidak dikenali
                return redirect()->route('login')->with('error', 'Role tidak valid!');
            }
        } else {
            // Verifikasi login gagal
            return redirect()->route('login')->with('error', 'Username atau password salah!');
        }
    }
}