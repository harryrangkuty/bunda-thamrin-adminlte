@extends('layouts.adminlte')

@section('content')
    <div class="container mt-3">
        <div class="card text-white rounded-3">
            <div class="card-header d-flex align-items-center">
                <h4 class="card-title mb-0 flex-grow-1"><strong>No. Pendaftaran : </strong>{{ $registration->registration_number }}</h4>
                <a href="{{ route('registrations.edit', $registration) }}" class="btn btn-warning me-2">
                    <i class="bi bi-pencil"></i>
                </a>
                <a href="{{ route('registrations.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left-circle-fill"></i>
                </a>
            </div>
            <div class="card-body">
                  <div class="row mb-2">
                    <div class="col-sm-3 fw-bold">Tanggal Pendaftaran:</div>
                    <div class="col-sm-9">{{ $registration->registration_date->format('Y-m-d') }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3 fw-bold">Nomor Rekam Medis Pasien:</div>
                    <div class="col-sm-9">{{ $registration->medrec_number }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3 fw-bold">Nama Pasien:</div>
                    <div class="col-sm-9">{{ $registration->patient->name ?? '-' }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3 fw-bold">No. HP Pasien:</div>
                    <div class="col-sm-9">{{ $registration->patient->phone ?? '-' }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
