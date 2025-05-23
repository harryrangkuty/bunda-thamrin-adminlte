@extends('layouts.adminlte')

@section('content')
    <div class="container mt-3">
        <div class="card text-white rounded-3">
            <div class="card-header d-flex align-items-center">
                <h3 class="card-title mb-0 flex-grow-1">Data Pasien</h3>
                <a href="{{ route('patients.create') }}" class="btn btn-primary d-flex align-items-center">
                    <i class="bi bi-plus-square me-2"></i>
                    Tambah Data
                </a>
            </div>
            <div class="card-body">
                {{-- Filter --}}
                <div class="d-flex justify-content-end align-items-center">
                    <form action="{{ route('patients.index') }}" method="GET" class="row g-3 mb-4">
                        <div class="col-md-3">
                            <small class="text-light">Mulai</small>
                            <input type="datetime-local" name="start_date" id="start_date" class="form-control"
                                value="{{ request('start_date') }}">
                        </div>
                        <div class="col-md-3">
                            <small class="text-light">Hingga</small>
                            <input type="datetime-local" name="end_date" id="end_date" class="form-control"
                                value="{{ request('end_date') }}">
                        </div>
                        <div class="col-md-3">
                            <small class="text-light">Cari Nama / No. RM</small>
                            <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                                placeholder="Nama/No. RM">
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary me-2 d-flex align-items-center">
                                <i class="bi bi-funnel me-2"></i>
                                Filter
                            </button>
                            <a href="{{ route('patients.index') }}" class="btn btn-info d-flex align-items-center">
                                <i class="bi bi-x-diamond me-2"></i>
                                Reset
                            </a>
                        </div>
                    </form>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="table-responsive rounded">
                    <table class="table table-bordered table-hover table-striped align-middle mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th style="width: 200px;">Nomor Rekam Medis</th>
                                <th style="width: 200px;">Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>No.Hp</th>
                                <th style="width: 50px;">Photo</th>
                                <th style="width: 120px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($patients as $patient)
                                <tr>
                                    <td class="text-center">
                                        {{ ($patients->currentPage() - 1) * $patients->perPage() + $loop->iteration }}.
                                    </td>
                                    <td>{{ $patient->medrec_number }}</td>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->gender_label }}</td>
                                    <td>{{ $patient->address }}</td>
                                    <td>{{ $patient->phone }}</td>
                                    <td class="text-center">
                                        @if ($patient->photo)
                                            <button type="button" class="btn btn-outline-secondary btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#photoModal{{ $patient->id }}"
                                                title="Lihat Foto">
                                                <i class="bi bi-camera"></i>
                                            </button>
                                        @else
                                            <span class="text-muted">No Photo</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('patients.show', $patient) }}"
                                            class="btn btn-outline-success btn-sm" title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('patients.edit', $patient) }}"
                                            class="btn btn-outline-warning btn-sm" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('patients.destroy', $patient) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Delete this patient?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                {{-- Modal Photo --}}
                                @if ($patient->photo)
                                    <div class="modal fade" id="photoModal{{ $patient->id }}" tabindex="-1"
                                        aria-labelledby="photoModalLabel{{ $patient->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary text-white">
                                                    <h5 class="modal-title" id="photoModalLabel{{ $patient->id }}">
                                                        Foto: {{ $patient->name }}
                                                    </h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <img src="{{ asset('storage/' . $patient->photo) }}"
                                                        alt="Photo {{ $patient->name }}" class="img-fluid rounded shadow">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">
                                        <i class="bi bi-database-x fs-5 me-2"></i> Data tidak ditemukan
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    {!! $patients->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
