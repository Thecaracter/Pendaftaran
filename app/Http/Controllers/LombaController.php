<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LombaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lomba = Lomba::all();
        return view('admin.lomba', compact('lomba'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'nama' => 'required|string',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
                'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'deskripsi' => 'required|string',
            ]);

            // Jika validasi gagal, lempar ValidationException
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            // Mengunggah dan menyimpan file foto
            // Mengunggah dan menyimpan file foto
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $path = $foto->storePublicly('foto', 'public'); // Simpan di direktori public/fotos
            }


            // Membuat instance Lomba
            $lomba = new Lomba;
            $lomba->nama = $request->input('nama');
            $lomba->tanggal_mulai = $request->input('tanggal_mulai');
            $lomba->tanggal_selesai = $request->input('tanggal_selesai');
            $lomba->foto = $path ?? null; // Simpan path file foto jika ada, jika tidak, isi dengan null
            $lomba->deskripsi = $request->input('deskripsi');

            // Menyimpan data Lomba
            $lomba->save();

            // Membuat notifikasi
            $notification = [
                'title' => 'Selamat!',
                'text' => 'Data pengguna berhasil ditambahkan',
                'type' => 'success',
            ];

            // Mengarahkan pengguna ke halaman index dengan notifikasi
            return redirect()->route('lomba.index')->with('notification', $notification);
        } catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag()->toArray();

            // Mengarahkan pengguna kembali ke halaman sebelumnya dengan kesalahan validasi
            return redirect()->back()->withErrors($errors)->withInput();
        } catch (\Exception $e) {
            // Menangani exception lainnya
            $notification = [
                'title' => 'Oops!',
                'text' => 'Ada yang salah ngab, coba lagi ya!',
                'type' => 'error',
            ];

            // Mengarahkan pengguna ke halaman index dengan notifikasi
            return redirect()->route('lomba.index')->with('notification', $notification);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}