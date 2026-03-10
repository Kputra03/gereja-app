<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <title>Laporan Keuangan Gereja</title>

    <style>

        /* ================= GLOBAL ================= */

        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 11px;
            color: #333;
        }

        /* ================= HEADER ================= */

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            color: #1e40af;
        }

        .header small {
            color: #555;
        }

        /* ================= SUMMARY ================= */

        .summary {
            margin-bottom: 20px;
        }

        .summary table {
            width: 100%;
        }

        .summary td {
            padding: 10px;
            border-radius: 6px;
            color: #fff;
            font-weight: bold;
            text-align: center;
        }

        .summary .in {
            background: #16a34a;
        }

        .summary .out {
            background: #dc2626;
        }

        .summary .saldo {
            background: #2563eb;
        }

        /* ================= TABLE ================= */

        table.data {
            width: 100%;
            border-collapse: collapse;
        }

        table.data th {
            background: #1e3a8a;
            color: #fff;
            padding: 6px;
        }

        table.data td {
            padding: 6px;
            border-bottom: 1px solid #ddd;
        }

        /* ================= BADGE ================= */

        .badge-in {
            background: #dcfce7;
            color: #166534;
            padding: 3px 6px;
            border-radius: 4px;
            font-weight: bold;
        }

        .badge-out {
            background: #fee2e2;
            color: #991b1b;
            padding: 3px 6px;
            border-radius: 4px;
            font-weight: bold;
        }

    </style>

</head>


<body>

    {{-- ================= HEADER ================= --}}
    <div class="header">

        <h2>LAPORAN KEUANGAN GEREJA</h2>
        <small>GKI Pondok Makmur</small>

    </div>



    {{-- ================= SUMMARY ================= --}}
    <div class="summary">

        <table>
            <tr>

                <td class="in">
                    Pemasukan <br>
                    Rp {{ number_format($totalPemasukan, 0, ',', '.') }}
                </td>

                <td class="out">
                    Pengeluaran <br>
                    Rp {{ number_format($totalPengeluaran, 0, ',', '.') }}
                </td>

                <td class="saldo">
                    Saldo Akhir <br>
                    Rp {{ number_format($saldoAkhir, 0, ',', '.') }}
                </td>

            </tr>
        </table>

    </div>



    {{-- ================= TABLE DATA ================= --}}
    <table class="data">

        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jenis</th>
                <th>Kategori</th>
                <th>Nominal</th>
            </tr>
        </thead>


        <tbody>

            @foreach($keuangan as $k)

                @php
                    $jenis = strtolower(trim($k->jenis));
                @endphp

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $k->tanggal }}</td>

                    <td>{{ $k->keterangan }}</td>

                    <td>

                        @if($jenis == 'pemasukan')

                            <span class="badge-in">
                                Pemasukan
                            </span>

                        @elseif($jenis == 'pengeluaran')

                            <span class="badge-out">
                                Pengeluaran
                            </span>

                        @else

                            <span>
                                {{ $k->jenis }}
                            </span>

                        @endif

                    </td>

                    <td>{{ $k->kategori }}</td>

                    <td>
                        Rp {{ number_format($k->nominal, 0, ',', '.') }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>


</body>

</html>