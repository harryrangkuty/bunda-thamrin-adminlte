@extends('layouts.adminlte')

@section('content')
    <div class="container mt-3">
        <div class="card text-white rounded-3">
            <div class="card-header">
                <h3 class="card-title">Edit Data Pasien</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('patients.update', $patient) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('pages.patient.form', ['patient' => $patient])
                </form>
            </div>
        </div>
    </div>
@endsection
