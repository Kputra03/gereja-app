<?php

namespace App\Exports;

use App\Models\Keuangan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class KeuanganExport implements FromCollection, WithHeadings, WithMapping
{
    protected $bulan;
    protected $tahun;

    public function __construct($bulan = null, $tahun = null)
    {
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function collection()
    {
        $query = Keuangan::query();

        if ($this->bulan) {
            $query->whereMonth('tanggal', $this->bulan);
        }

        if ($this->tahun) {
            $query->whereYear('tanggal', $this->tahun);
        }

        return $query->orderBy('tanggal')->get();
    }

    public function headings(): array
    {
        return ['Tanggal', 'Keterangan', 'Jenis', 'Kategori', 'Nominal (Rp)'];
    }

    public function map($row): array
    {
        return [
            $row->tanggal,
            $row->keterangan,
            ucfirst($row->jenis),
            $row->kategori,
            $row->nominal,
        ];
    }


     public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1,
        ];
    }
}
