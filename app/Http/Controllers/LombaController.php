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
                'nama' => 'required',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date',
                'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'harga' => 'required|integer',
                'deskripsi' => 'required',
            ]);

            // Jika validasi gagal, lempar ValidationException
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            // Mengunggah dan menyimpan file foto
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fileName = time() . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('foto'), $fileName);
                $path = 'foto/' . $fileName;
            }

            // Membuat instance Lomba
            $lomba = new Lomba;
            $lomba->nama = $request->input('nama');
            $lomba->tanggal_mulai = $request->input('tanggal_mulai');
            $lomba->tanggal_selesai = $request->input('tanggal_selesai');
            $lomba->foto = $path ?? null; // Simpan path file foto jika ada, jika tidak, isi dengan null
            $lomba->harga = $request->input('harga');
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
    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $validator = Validator::make($request->all(), [
                'nama' => 'required',
                'tanggal_mulai' => 'required|date',
                'tanggal_selesai' => 'required|date',
                'foto' => 'image|mimes:jpeg,png,jpg|max:2048',
                'harga' => 'required|integer',
                'deskripsi' => 'required',
            ]);

            // Jika validasi gagal, lempar ValidationException
            if ($validator->fails()) {
                throw new ValidationException($validator);
            }

            // Mencari data Lomba berdasarkan ID
            $lomba = Lomba::findOrFail($id);

            // Mengunggah dan menyimpan file foto jika ada perubahan
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fileName = time() . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('foto'), $fileName);
                $path = 'foto/' . $fileName;

                // Hapus file foto lama jika ada
                if ($lomba->foto) {
                    $oldFilePath = public_path($lomba->foto);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                $lomba->foto = $path;
            }

            // Memperbarui data Lomba
            $lomba->nama = $request->input('nama');
            $lomba->tanggal_mulai = $request->input('tanggal_mulai');
            $lomba->tanggal_selesai = $request->input('tanggal_selesai');
            $lomba->harga = $request->input('harga');
            $lomba->deskripsi = $request->input('deskripsi');

            // Menyimpan perubahan pada data Lomba
            $lomba->save();

            // Membuat notifikasi
            $notification = [
                'title' => 'Berhasil!',
                'text' => 'Data Lomba berhasil diperbarui',
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
                'text' => 'Terjadi kesalahan, silakan coba lagi!',
                'type' => 'error',
            ];

            // Mengarahkan pengguna ke halaman index dengan notifikasi
            return redirect()->route('lomba.index')->with('notification', $notification);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Lomba::findOrFail($id);
        $user->delete();

        $notification = [
            'title' => 'Selamat!',
            'text' => 'Data pengguna berhasil dihapus',
            'type' => 'success',
        ];

        return redirect()->route('lomba.index')->with('notification', $notification)->withInput();
    }
}