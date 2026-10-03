<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller{
    public function showRegister(){
        return view('auth.register');
    }
    public function processRegister(Request $request){
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Membuat user baru
        User::create([
            'nama' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id'=> 2, // Set role default sebagai 'staff'
        ]);

        // Redirect ke halaman login setelah registrasi berhasil
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silahkan Login');
    }

    // Menampilkan halaman form login
    public function showLogin()
    {
        return view('auth.login'); // Sesuaikan dengan nama file blade login kamu
    }

    // Memproses data login
    public function processLogin(Request $request)
    {
        // 1. Validasi input
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // 2. Cek kecocokan data ke database
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            // Arahkan ke halaman dashboard setelah sukses login
            return redirect()->intended('/dashboard')->with('success', 'Berhasil login!');
        }

        // 3. Jika gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang kamu masukkan salah.',
        ])->onlyInput('email');
    }
}
