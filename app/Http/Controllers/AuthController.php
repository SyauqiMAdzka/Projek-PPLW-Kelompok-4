<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class AuthController extends Controller
{
    // --- FITUR LOGIN ---
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard'); 
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // --- FITUR REGISTRASI ---
    public function showRegisterForm()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed', // 'confirmed' memvalidasi input 'password_confirmation'
            'role_id' => 'required|exists:roles,id'
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => strtolower(trim($request->email)),
            'password' => Hash::make($request->password), 
            'role_id' => $request->role_id
        ]);

        Auth::login($user);
        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil!');
    }

    // --- FITUR LOGOUT ---
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}