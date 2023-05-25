<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use App\Models\Pendaftaran;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PendaftaranUserController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Mengambil data pengguna saat ini

        $lombas = Lomba::all();

        $userpendaftaran = DB::table('pendaftaran')
            ->join('lomba', 'pendaftaran.id_lomba', '=', 'lomba.id')
            ->select('pendaftaran.*', 'lomba.nama')
            ->where('pendaftaran.id_user', $user->id) // Menambahkan kondisi WHERE
            ->get();

        return view('user.pendaftaran', compact('userpendaftaran', 'lombas'));
    }

    public function store(Request $request)
    {
        // Validasi inputan form
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'nisn' => 'required',
            'id_lomba' => 'required',
            'no_hp' => 'required',
            'asal_sekolah' => 'required',
        ]);

        // Proses penyimpanan data ke dalam database
        $user = Auth::user(); // Mengambil data pengguna saat ini
        $userpendaftaran = new Pendaftaran();
        $userpendaftaran->nama_peserta = $request->username;
        $userpendaftaran->email = $request->email;
        $userpendaftaran->alamat = $request->alamat;
        $userpendaftaran->nisn = $request->nisn;
        $userpendaftaran->id_lomba = $request->id_lomba;
        $userpendaftaran->no_hp = $request->no_hp;
        $userpendaftaran->asal_sekolah = $request->asal_sekolah;
        $userpendaftaran->tanggal_pendaftaran = Carbon::now(); // Menggunakan nilai saat ini
        $userpendaftaran->id_user = $user->id; // Menyimpan ID pengguna saat ini
        $userpendaftaran->save();

        // Update status pengguna dari 1 ke 2
        $user->status = 2;
        $user->save();

        // Redirect atau berikan respon sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Profil berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        // Validasi inputan form
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'nisn' => 'required',
            'id_lomba' => 'required',
            'no_hp' => 'required',
            'asal_sekolah' => 'required',
            // 'status_pembayaran' => 'required', // Tambahkan validasi status_pembayaran
        ]);

        // Proses pembaruan data di dalam database
        // Misalnya:
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->nama_peserta = $request->username;
        $pendaftaran->email = $request->email;
        $pendaftaran->alamat = $request->alamat;
        $pendaftaran->nisn = $request->nisn;
        $pendaftaran->id_lomba = $request->id_lomba;
        $pendaftaran->no_hp = $request->no_hp;
        $pendaftaran->asal_sekolah = $request->asal_sekolah;
        // $pendaftaran->status_pembayaran = $request->status_pembayaran; // Perbarui status_pembayaran
        $pendaftaran->tanggal_pendaftaran = Carbon::now(); // Menggunakan nilai saat ini
        $pendaftaran->save();

        // Redirect atau berikan respon sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }
    public function destroy(string $id)
    {
        $user = Pendaftaran::findOrFail($id);
        $user->delete();

        // Update status pengguna dari 1 ke 2
        $user = User::findOrFail($user->id_user);
        $user->status = 1;
        $user->save();

        $notification = [
            'title' => 'Selamat!',
            'text' => 'Data pengguna berhasil dihapus',
            'type' => 'success',
        ];

        return redirect()->route('pendaftaranuser.index')->with('success', 'Profil berhasil diperbarui');
    }

}