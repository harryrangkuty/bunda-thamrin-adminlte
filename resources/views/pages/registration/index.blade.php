@extends('layouts.adminlte')

@section('content')
    <div class="container mt-3">
        <div class="card text-white rounded-3">
            <div class="card-header d-flex align-items-center">
                <h3 class="card-title mb-0 flex-grow-1">Data Pendaftaran Pasien</h3>
                <a href="{{ route('registrations.create') }}" class="btn btn-primary d-flex align-items-center">
                    <i class="bi bi-plus-square me-2"></i>
                    Tambah Data
                </a>
            </div>
            <div class="card-body">
                <div
                    class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                    <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Export
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('registrations.export.pdf', request()->query()) }}">Export PDF</a>
                            </li>
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('registrations.export.excel', request()->query()) }}">Export Excel</a>
                            </li>
                        </ul>
                    </div>
                    {{-- Filter --}}
                    <form action="{{ route('registrations.index') }}" method="GET" class="row g-3 mb-4">
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
                            <small class="text-light">No RM / No. Registrasi</small>
                            <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                                placeholder="No. RM/No. Reg">
                        </div>
                        <div class="col-md-3 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary me-2 d-flex align-items-center">
                                <i class="bi bi-funnel me-2"></i>
                                Filter
                            </button>
                            <a href="{{ route('registrations.index') }}" class="btn btn-info d-flex align-items-center">
                                <i class="bi bi-x-diamond me-2"></i>
                                Reset
                            </a>
                        </div>
                    </form>
                </div>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <div class="table-responsive rounded">
                    <table class="table table-bordered table-hover table-striped align-middle mb-0">
                        <thead class="table-primary">
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>Nomor Pendaftaran</th>
                                <th>Tanggal Pendaftaran</th>
                                <th>Nomor Rekam Medis</th>
                                <th>Nama Pasien</th>
                                <th>Nomor HP</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($registrations as $registration)
                                <tr>
                                    <td class="text-center">
                                        {{ ($registrations->currentPage() - 1) * $registrations->perPage() + $loop->iteration }}.
                                    </td>
                                    <td>{{ $registration->registration_number }}</td>
                                    <td>{{ $registration->registration_date->format('Y-m-d') }}</td>
                                    <td>{{ $registration->medrec_number }}</td>
                                    <td>{{ $registration->patient->name ?? '-' }}</td>
                                    <td>{{ $registration->patient->phone ?? '-' }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('registrations.show', $registration) }}"
                                            class="btn btn-outline-success btn-sm" title="View">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('registrations.edit', $registration) }}"
                                            class="btn btn-outline-warning btn-sm" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('registrations.destroy', $registration) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Delete this registration?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
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
                    {!! $registrations->links('pagination::bootstrap-5') !!}
                </div>
            </div>
        </div>
    </div>
@endsection