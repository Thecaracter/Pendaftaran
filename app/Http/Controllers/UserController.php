<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::where('role', 'user')->get();
        return view('admin.user', compact('user'));
    }


    /**
     * Show the form for creating a new resource.
     */

    public function create(Request $request)
    {
        try {
            // Validasi input pengguna
            $validator = Validator::make($request->all(), [
                'username' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8',
                'role' => 'required|in:admin,user',
            ]);

            // Jika validasi gagal, kembalikan respon dengan pesan error dan informasi yang kurang
            if ($validator->fails()) {
                $errors = $validator->errors();
                $errorMessage = '';

                if ($errors->has('username')) {
                    $errorMessage .= 'Username is required. ';
                }

                if ($errors->has('email')) {
                    $errorMessage .= 'Email is required. ';
                }

                if ($errors->has('password')) {
                    $errorMessage .= 'Password is required and must be at least 8 characters. ';
                }

                if ($errors->has('role')) {
                    $errorMessage .= 'Role is required and must be either admin or user. ';
                }

                // Tampilkan notifikasi Swal.fire dengan pesan error dan informasi yang kurang
                $notification = [
                    'title' => 'Oops!',
                    'text' => $errorMessage,
                    'type' => 'error',
                ];

                return redirect()->back()->with('notification', $notification)->withInput();
            }

            // Buat data pengguna baru
            $user = new User();
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->role = $request->input('role');
            $user->save();

            // Tampilkan notifikasi Swal.fire
            $notification = [
                'title' => 'Selamat!',
                'text' => 'Data pengguna berhasil ditambahkan',
                'type' => 'success',
            ];

            return redirect()->route('user.index')->with('notification', $notification);
        } catch (\Exception $e) {
            // Log error jika terjadi kesalahan
            Log::error($e->getMessage());

            // Tampilkan notifikasi Swal.fire
            $notification = [
                'title' => 'Oops!',
                'text' => 'Terjadi kesalahan saat menambahkan data pengguna',
                'type' => 'error',
            ];

            return redirect()->back()->with('notification', $notification)->withInput();
        }
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function updateProfile(Request $request)
    {
        // Validasi input form
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|string|min:6|confirmed',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'foto' => 'nullable|image|max:2048', // Ubah sesuai kebutuhan
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        // Update data username dan email
        $user->username = $request->username;
        $user->email = $request->email;

        // Update password jika diisi
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // Update alamat dan nomor telepon
        $user->alamat = $request->alamat;
        $user->no_telp = $request->no_telp;

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fileName = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('foto'), $fileName);
            $path = 'foto/' . $fileName;

            // Hapus file foto lama jika ada
            if ($user->foto) {
                $oldFilePath = public_path($user->foto);
                if (file_exists($oldFilePath)) {
                    unlink($oldFilePath);
                }
            }

            $user->foto = $path;
        }

        // Simpan perubahan
        $user->save();

        // Redirect ke halaman profil
        return redirect()->route('/profile')->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(Request $request, $id)
    {
        try {
            // Validasi input pengguna
            $validator = Validator::make($request->all(), [
                'username' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'nullable|string|min:8',
                'role' => 'required|in:admin,user',
            ]);

            // Jika validasi gagal, kembalikan respon dengan pesan error
            if ($validator->fails()) {
                $errors = $validator->errors()->all();

                // Tampilkan notifikasi Swal.fire dengan pesan validasi
                $notification = [
                    'title' => 'Oops!',
                    'text' => 'Terjadi kesalahan saat memperbarui data pengguna',
                    'type' => 'error',
                    'validation' => $errors,
                ];

                return redirect()->back()->with('notification', $notification)->withInput();
            }

            // Temukan pengguna berdasarkan ID
            $user = User::findOrFail($id);

            // Update data pengguna
            $user->username = $request->input('username');
            $user->email = $request->input('email');
            $user->role = $request->input('role');

            // Periksa apakah ada input password baru
            if ($request->filled('password')) {
                $user->password = bcrypt($request->input('password'));
            }

            $user->save();

            return redirect()->route('user.index')->with('success', 'Data pengguna berhasil diperbarui');
        } catch (\Exception $e) {
            Log::error($e);

            // Tampilkan notifikasi Swal.fire dengan pesan error umum
            $notification = [
                'title' => 'Oops!',
                'text' => 'Terjadi kesalahan saat memperbarui data pengguna',
                'type' => 'error',
            ];

            return redirect()->back()->with('notification', $notification)->withInput();
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        $notification = [
            'title' => 'Selamat!',
            'text' => 'Data pengguna berhasil dihapus',
            'type' => 'success',
        ];

        return redirect()->route('user.index')->with('notification', $notification)->withInput();
    }
}