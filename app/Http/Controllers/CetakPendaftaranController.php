<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class CetakPendaftaranController extends Controller
{
    public function generateCetakPendaftaran($id)
    {
        // Mengambil data pendaftaran dari database berdasarkan ID
        $pendaftaran = Pendaftaran::with('lomba')->find($id);

        // Jika data pendaftaran tidak ditemukan, maka kembalikan ke halaman sebelumnya
        if (!$pendaftaran) {
            return redirect()->back()->with('error', 'Data pendaftaran tidak ditemukan.');
        }

        // Mengirim data pendaftaran ke halaman cetak pendaftaran
        return view('cetak.cetak-pendaftaran', compact('pendaftaran'));
    }

}