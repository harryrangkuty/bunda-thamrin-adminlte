


@extends('layouts.adminlte')

@section('content')
    <div class="container mt-3">
        <div class="card text-white rounded-3">
            <div class="card-header">
                <h3 class="card-title">Tambah Data Pasien</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                     @include('pages.patient.form')
                </form>
            </div>
        </div>
    </div>
@endsection
