<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Exports\KeuanganExport;
use App\Models\Keuangan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KeuanganController extends Controller
{
    public function index(Request $request)
{
    $bulan = $request->bulan;
    $tahun = $request->tahun ?? now()->year;

    $keuangan = Keuangan::query()
        ->when($bulan, function ($q) use ($bulan) {
            $q->whereMonth('tanggal', $bulan);
        })
        ->whereYear('tanggal', $tahun)
        ->orderBy('tanggal')
        ->get();

    $totalMasuk = $keuangan->where('jenis', 'pemasukan')->sum('nominal');
    $totalKeluar = $keuangan->where('jenis', 'pengeluaran')->sum('nominal');
    $saldoAkhir = $totalMasuk - $totalKeluar;

    $tahunSekarang = now()->year;

    // Ambil tahun unik dari database
    $tahunDB = Keuangan::select(
            DB::raw('YEAR(tanggal) as tahun')
        )
        ->distinct()
        ->pluck('tahun')
        ->toArray();

    // Buat range 5 tahun ke belakang
    $tahunRange = [];
    for ($i = 0; $i <= 5; $i++) {
        $tahunRange[] = $tahunSekarang - $i;
    }

// Gabungkan & unik
$daftarTahun = collect(array_unique(array_merge($tahunDB, $tahunRange)))
    ->sortDesc()
    ->values();

    return view('admin.keuangan.index', compact(
        'keuangan',
        'totalMasuk',
        'totalKeluar',
        'saldoAkhir',
        'bulan',
        'tahun',
        'daftarTahun'
    ));
}
    public function create()
    {
        return view('admin.keuangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis' => 'required',
            'kategori' => 'required',
            'nominal' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        Keuangan::create($request->all());

        return redirect()->route('admin.keuangan.index')
            ->with('success', 'Data keuangan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $keuangan = Keuangan::findOrFail($id);
        return view('admin.keuangan.edit', compact('keuangan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis' => 'required',
            'kategori' => 'required',
            'nominal' => 'required|numeric',
            'tanggal' => 'required|date',
        ]);

        $keuangan = Keuangan::findOrFail($id);
        $keuangan->update($request->all());

        return redirect()->route('admin.keuangan.index')
            ->with('success', 'Data keuangan berhasil diperbarui');
    }

    public function destroy($id)
    {
        Keuangan::destroy($id);

        return redirect()->route('admin.keuangan.index')
            ->with('success', 'Data keuangan berhasil dihapus');
    }

    public function exportExcel()
    {
        return Excel::download(
    new KeuanganExport(request('bulan'), request('tahun')),
    'laporan-keuangan.xlsx'
    );
    }
    public function exportPdf(Request $request)
{
    $query = Keuangan::query();

    if ($request->bulan) {
        $query->whereMonth('tanggal', $request->bulan);
    }

    if ($request->tahun) {
        $query->whereYear('tanggal', $request->tahun);
    }

    $keuangan = $query->orderBy('tanggal')->get();

    $totalPemasukan = $keuangan->where('jenis','pemasukan')->sum('nominal');
    $totalPengeluaran = $keuangan->where('jenis','pengeluaran')->sum('nominal');
    $saldoAkhir = $totalPemasukan - $totalPengeluaran;

    $pdf = PDF::loadView('admin.keuangan.pdf', compact(
        'keuangan',
        'totalPemasukan',
        'totalPengeluaran',
        'saldoAkhir'
    ));

    return $pdf->download('laporan-keuangan.pdf');
}

}
