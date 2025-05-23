@extends('layouts.adminlte')

@section('content')
    <div class="container mt-3">
        <div class="card text-white rounded-3">
            <div class="card-header">
                <h3 class="card-title">Isi Pendaftaran</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('registrations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('pages.registration.form')
                </form>
            </div>
        </div>
    </div>
@endsection
