<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if ($user && in_array($user->role, $roles)) {
            // Pengguna memiliki peran yang diperbolehkan, arahkan ke rute yang sesuai berdasarkan peran
            switch ($user->role) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                case 'user':
                    return redirect()->route('mahasiswa.dashboard');
            }
        }

        // Pengguna tidak memiliki peran yang diperbolehkan, arahkan ke halaman lain (misalnya, halaman login)
        return redirect()->route('login');
    }
}