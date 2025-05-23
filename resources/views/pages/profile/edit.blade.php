@extends('layouts.adminlte')

@section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            {{-- Profile Info --}}
            <div class="card mt-4 text-light">
                <div class="card-header">
                    <h3 class="card-title">Informasi Profil</h3>
                </div>
                <div class="card-body">
                    @include('pages.profile.partials.update-profile-information-form')
                </div>
            </div>
            {{-- Update Password --}}
            <div class="card mt-4 text-light">
                <div class="card-header">
                    <h3 class="card-title">Ganti Kata Sandi</h3>
                </div>
                <div class="card-body">
                    @include('pages.profile.partials.update-password-form')
                </div>
            </div>
            {{-- Delete User --}}
            <div class="card mt-4 text-light">
                <div class="card-header">
                    <h3 class="card-title">Hapus Akun</h3>
                </div>
                <div class="card-body">
                    @include('pages.profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </section>
</div>
@endsection