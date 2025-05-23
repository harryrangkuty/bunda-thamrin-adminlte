<!DOCTYPE html>
<html>

<head>
    <title>Registrations</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .kop {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="kop">
        <div class="kop" style="display: flex; align-items: center; justify-content: center; gap: 20px;">
            <img src="{{ public_path('images/bunda-thamrin-logo.png') }}" alt="Logo" style="height: 60px;">
            <div>
                <h1 style="color: red; margin: 0;">RSU Bunda Thamrin</h1>
                <small>Jl. Sei Batang Hari No.28-30-42, Babura Sunggal, Kec. Medan Sunggal, Kota Medan, Sumatera Utara
                    20112</small>
            </div>
        </div>
        <hr>
        <h4>Data Pendaftaran Pasien</h4>
    </div>
    <table>
        <thead>
            <tr>
                <th>No Pendaftaran</th>
                <th>Tgl Pendaftaran</th>
                <th>No Rekam Medis</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No. Hp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registrations as $r)
                <tr>
                    <td>{{ $r->registration_number }}</td>
                    <td>{{ \Carbon\Carbon::parse($r->registration_date)->format('d-m-Y') }}</td>
                    <td>{{ $r->medrec_number }}</td>
                    <td>{{ $r->patient->name ?? '-' }}</td>
                    <td>{{ $r->patient->gender_label ?? '-' }}</td>
                    <td>{{ $r->patient->address ?? '-' }}</td>
                    <td>{{ $r->patient->phone ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>