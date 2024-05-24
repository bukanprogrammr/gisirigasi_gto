<?php

namespace App\Http\Controllers\Auth;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('auth.passwords.change', [
            "masyarakat" => Masyarakat::all(),
        ]);
    }

    public function changePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|confirmed',
        ]);

        // Mendapatkan pengguna saat ini
        $user = Auth::user();

        // Memeriksa apakah password lama cocok
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Password lama salah.']);
        }

        // Mengganti password
        $user->password = bcrypt($request->new_password);
        $user->save();

        // Logout pengguna setelah mengganti password
        Auth::logout();

        // Mengarahkan pengguna ke halaman login dengan pesan sukses
        return redirect('/login')->with('pesan', 'Password berhasil diubah. Silakan login kembali dengan password baru Anda.');
    }
}
