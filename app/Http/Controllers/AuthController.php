<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegisterForm(){ // menampilkan sebuah  register
        $title = "register";
        return view('auth.register', compact('title'));
    }
    public function register(Request $request){ // bagian yang mengontrol dari sebuah register 
        // melakukan request dengan memvalidasi
        $request->validate([
            // mengambil dari input name dari register.blade.php dan memvalidasi bahwa dia harus diisi dan maksimal tidak lebih dari 255 karakter
            'name' => 'required|max:255',
            // mengambil dari input username dari register.blade.php dan memvalidasi bahwa dia harus diisi dan maksimal tidak lebih dari 255 karakter, dan memiliki sebuah karater unik
            'username' => 'required|max:255|unique:users',
            // mengambil dari input password dari register.blade.php dan memvalidasi bahwa dia harus diisi dan maksimal tidak lebih dari 32 karakter, dan harus dikonfirmasi sekali lagi oleh user
            'password'=>'required|max:32|confirmed',
        ]);
        // lalu menyimpannya ke sebuah database mysql
       $user =  User::create([
        // mengambil dari input name dari register.blade.php dan melakukan request ke table users dengan field name
            'name' => $request->name,
         // mengambil dari input username dari register.blade.php dan melakukan request ke table users dengan field username
            'username' => $request->username,
         // mengambil dari input password dari register.blade.php dan melakukan request ke table users dengan field password
            'password' =>bcrypt($request-> password),
        ]);
        // lalu akan kembali ke halaman login
        return redirect()->route('login')->with('succes', 'Berhasil Register');
    }
    public function showLoginForm(){ // menampilkan login
        $title = "Login";
        return view('auth.login', compact('title'));
    }
    public function login(Request $request){ // mengontrol bagian login
        // Ambil data username & password dari form.
        $credentials = $request->only('username', 'password');

        //Coba login dengan data itu.
        if(Auth::attempt($credentials)){
            
            //Kalau login berhasil → bikin session baru (biar aman dari session hijacking).
            $request->session()->regenerate();
            //Setelah itu → pindahkan user ke halaman tickets.index dengan pesan sukses.
            return redirect()->route('tickets.index')->with('succes');
        }
        // kalau gagal tampilkan pesan error , username, atau password salah
        return back()->withErrors(['username'=> 'username Atau password salah']);
    }
    public function logout(Request $request, ){ //mengontrol bagian logout

        // user dikeluarkan dari status login.
        Auth::logout();

        //session lama dihancurkan supaya tidak bisa dipakai lagi.
        $request->session()->invalidate();

        //bikin CSRF token baru untuk keamanan.
        $request->session()->regenerateToken();
        
       // kirim user ke halaman login dengan pesan sukses.
        return redirect()->route('login')->with('succes', 'Logout Berhasil');
    }

   
}
