@extends('layouts.adminlte')

@section('content')
    <div class="container mt-3">
        <div class="card text-white rounded-3">
            <div class="card-header d-flex align-items-center">
                <h4 class="card-title mb-0 flex-grow-1">{{ $patient->name }}</h4>
                 <a href="{{ route('patients.edit', $patient) }}" class="btn btn-warning me-2">
                    <i class="bi bi-pencil"></i>
                </a>
                <a href="{{ route('patients.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle-fill"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm-3 fw-bold">Nomor Rekam Medis:</div>
                    <div class="col-sm-9">{{ $patient->medrec_number }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3 fw-bold">Jenis Kelamin:</div>
                    <div class="col-sm-9">{{ $patient->gender_label }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3 fw-bold">Alamat Lengkap:</div>
                    <div class="col-sm-9">{{ $patient->address ?? '-' }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3 fw-bold">No Handphone:</div>
                    <div class="col-sm-9">{{ $patient->phone ?? '-' }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3 fw-bold">Email:</div>
                    <div class="col-sm-9">{{ $patient->email ?? '-' }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3 fw-bold">Photo:</div>
                    <div class="col-sm-9">
                        @if ($patient->photo)
                            <a href="#" data-bs-toggle="modal" data-bs-target="#photoModal">
                                <img src="{{ asset('storage/' . $patient->photo) }}" width="150" alt="Photo"
                                    style="cursor:pointer;">
                            </a>
                            <!-- Modal -->
                            <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="photoModalLabel">Foto Pasien</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="{{ asset('storage/' . $patient->photo) }}" alt="Photo"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <span class="text-muted">Tidak ada foto yang tersedia</span>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
