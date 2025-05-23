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
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($registrations as $r)
            <tr>
                <td>&#8203;{{ $r->registration_number }}</td>
                <td>{{ \Carbon\Carbon::parse($r->registration_date)->format('d-m-Y') }}</td>
                <td>{{ $r->medrec_number }}</td>
                <td>{{ $r->patient->name ?? '-' }}</td>
                <td>{{ $r->patient->gender_label ?? '-' }}</td>
                <td>{{ $r->patient->address ?? '-' }}</td>
                <td>{{ $r->patient->phone ?? '-' }}</td>
                <td>{{ $r->patient->email ?? '-' }}</td>
            </tr>
        @endforeach
    </tbody>
</table>