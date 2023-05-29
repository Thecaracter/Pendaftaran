<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;
use App\Models\Pendaftaran;

class PaymentController extends Controller
{
    public function redirectToPayment($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        $pendaftaran->load('lomba'); // Memuat relasi 'lomba'

        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => 'Pembayaran-' . $pendaftaran->id,
                'gross_amount' => (float) $pendaftaran->lomba->harga,
                // Mengambil harga dari relasi 'lomba'
            ],
            'customer_details' => [
                'first_name' => $pendaftaran->nama_peserta,
                'email' => $pendaftaran->email,
                'phone' => $pendaftaran->no_hp,
            ],
        ];

        try {
            $transaction = Snap::createTransaction($params);

            $paymentToken = $transaction->token;

            return view('payment.redirect', compact('paymentToken', 'pendaftaran'));
        } catch (\Exception $e) {
            // Handle error
            return $e->getMessage();
        }
    }


    public function updatePayment(Request $request)
    {
        $pendaftaranId = $request->input('pendaftaranId');
        $jumlah = $request->input('jumlah');
        $tanggalPembayaran = now(); // Menggunakan now() untuk mendapatkan tanggal dan waktu saat ini

        // Perbarui data pendaftaran
        $pendaftaran = Pendaftaran::findOrFail($pendaftaranId);
        $pendaftaran->status_pembayaran = 2; // Ubah status menjadi 2 (berhasil)
        $pendaftaran->save();

        // Buat entri baru di tabel pembayaran
        $pembayaran = new Pembayaran();
        $pembayaran->id_pendaftaran = $pendaftaranId;
        $pembayaran->jumlah = $jumlah;
        $pembayaran->tanggal_pembayaran = $tanggalPembayaran;
        $pembayaran->save();

        return redirect()->route('pendaftaranuser.index')->with('success', 'Wes Bayar Bos');
    }




}