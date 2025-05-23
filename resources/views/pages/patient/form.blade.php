@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Terjadi kesalahan:</strong>
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="mb-3">
    <label>Nama</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $patient->name ?? '') }}" required>
</div>

<div class="mb-3">
    <label class="form-label d-block">Jenis Kelamin</label>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="genderM" value="M"
            {{ old('gender', $patient->gender ?? 'M') === 'M' ? 'checked' : '' }}>
        <label class="form-check-label" for="genderM">Laki-laki</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="genderF" value="F"
            {{ old('gender', $patient->gender ?? 'M') === 'F' ? 'checked' : '' }}>
        <label class="form-check-label" for="genderF">Perempuan</label>
    </div>
</div>

<div class="mb-3">
    <label>Alamat</label>
    <input type="text" name="address" class="form-control" value="{{ old('address', $patient->address ?? '') }}">
</div>

<div class="mb-3">
    <label>No. Handphone Aktif</label>
    <input type="text" name="phone" class="form-control" value="{{ old('phone', $patient->phone ?? '') }}">
</div>

<div class="mb-3">
    <label>Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $patient->email ?? '') }}">
</div>

<div class="mb-3">
    <label>Photo</label>
    <input type="file" name="photo" class="form-control">
    @if (!empty($patient->photo))
        <img src="{{ asset('storage/' . $patient->photo) }}" width="100" class="mt-2">
    @endif
</div>

<button type="submit" class="btn btn-success">Simpan</button>
<a href="{{ route('patients.index') }}" class="btn btn-secondary">Kembali</a>
