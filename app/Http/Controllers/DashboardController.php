<?php

namespace App\Http\Controllers;

use App\Models\Lomba;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $usercount = User::count();
        $lombaCount = Lomba::count();
        $pendaftaranCount = Pendaftaran::count();
        $pembayaranCount = Pembayaran::count();
        $lombas = Lomba::all();

        // Data pendaftaran per bulan pada tahun ini
        $pendaftaranData = Pendaftaran::selectRaw('count(*) as total, MONTH(tanggal_pendaftaran) as month')
            ->whereYear('tanggal_pendaftaran', '=', Carbon::now()->format('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // Menginisialisasi array bulanLabels
        $bulanLabels = [];

        // Loop untuk mengisi array bulanLabels
        foreach ($pendaftaranData as $data) {
            $bulanLabels[] = Carbon::parse('2023-' . $data->month . '-01')->format('M');
        }

        // Mengubah format pendaftaranData menjadi array
        $pendaftaranDataArray = $pendaftaranData->pluck('total')->toArray();

        return view('admin.dashboard', compact('usercount', 'lombaCount', 'pendaftaranCount', 'pembayaranCount', 'pendaftaranDataArray', 'bulanLabels', 'lombas'));
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