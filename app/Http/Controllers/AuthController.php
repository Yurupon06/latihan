<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }




    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'roles' => 'customer'
        ]);

        return redirect()->route('login');
    }




    public function showLoginForm()
    {
        return view('auth.login');
    }




    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            session()->flash('message', 'Logged in as ' . $user->name);
            if ($user->roles === 'admin') {
                return redirect('dashboard');
            }
            if ($user->roles === 'customer') {
                return redirect('user');
            }
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }




    public function showForgotForm()
    {
        return view('auth.forgot');
    }




    public function forgot(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email not found']);
        }
        if ($user->roles == 'admin') {
            return back()->withErrors(['email' => 'Invalid Email']);
        }

        return back()->with(['email' => $request->email]);
    }




    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:3|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('status', 'Password has been reset');
    }



    public function qrLogin($token)
    {
        // Cari pengguna berdasarkan token qr_login_token
        $user = User::where('qr_login_token', $token)->first();
    
        // Jika pengguna ditemukan dengan token yang sesuai
        if ($user) {
            // Login pengguna menggunakan Auth::login
            Auth::login($user);
            session()->flash('message', 'Logged in as ' . $user->name);
            // Redirect ke halaman yang sesuai berdasarkan peran pengguna
            if ($user->roles === 'admin') {
                return redirect()->route('dashboard.index');
            } elseif ($user->roles === 'customer') {
                return redirect()->route('user.index');
            }
        }
    
        // Jika token tidak valid atau kadaluarsa, kembalikan ke halaman login dengan pesan kesalahan
        return redirect()->route('login')->withErrors(['Invalid or expired QR code']);
    }
    
    
    



    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

