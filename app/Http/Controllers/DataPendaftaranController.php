<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use App\Models\Pendaftaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DataPendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lombas = Lomba::all();
        $pendaftaran = DB::table('pendaftaran')
            ->join('lomba', 'pendaftaran.id_lomba', '=', 'lomba.id')
            ->select('pendaftaran.*', 'lomba.nama')
            ->get();
        return view('admin.datapendaftaran', compact('pendaftaran', 'lombas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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
        // Misalnya:
        $pendaftaran = new Pendaftaran;
        $pendaftaran->nama_peserta = $request->username;
        $pendaftaran->email = $request->email;
        $pendaftaran->alamat = $request->alamat;
        $pendaftaran->nisn = $request->nisn;
        $pendaftaran->id_lomba = $request->id_lomba;
        $pendaftaran->no_hp = $request->no_hp;
        $pendaftaran->asal_sekolah = $request->asal_sekolah;
        $pendaftaran->tanggal_pendaftaran = Carbon::now(); // Menggunakan nilai saat ini
        $pendaftaran->save();


        // Redirect atau berikan respon sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Profil berhasil disimpan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        // Validasi inputan form
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'nisn' => 'required',
            'id_lomba' => 'required',
            'no_hp' => 'required',
            'asal_sekolah' => 'required',
            'status_pembayaran' => 'required', // Tambahkan validasi status_pembayaran
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
        $pendaftaran->status_pembayaran = $request->status_pembayaran; // Perbarui status_pembayaran
        $pendaftaran->tanggal_pendaftaran = Carbon::now(); // Menggunakan nilai saat ini
        $pendaftaran->save();

        // Redirect atau berikan respon sesuai kebutuhan Anda
        return redirect()->back()->with('success', 'Profil berhasil diperbarui');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Pendaftaran::findOrFail($id);
        $user->delete();

        $notification = [
            'title' => 'Selamat!',
            'text' => 'Data pengguna berhasil dihapus',
            'type' => 'success',
        ];

        return redirect()->route('pembayaran.index')->with('success', 'Profil berhasil diperbarui');
    }
}