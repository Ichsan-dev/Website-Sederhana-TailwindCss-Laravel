<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ResetPasswordController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('ResetPassword.index', compact('user'));
    }

    public function UpdatePassword(Request $request)
    {
         $user = Auth::user();

            // Validasi data formulir
            $validator = Validator::make($request->all(), [
                'current_password' => 'required',
                'new_password' => 'required|min:8|confirmed',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            }

            // Cek apakah kata sandi saat ini cocok
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->with('error', 'Kata sandi saat ini tidak cocok.');
            }

            // Perbarui kata sandi
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->back()->with('status', 'Kata sandi berhasil diperbarui.');
    }
}
