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
    <label for="registration_date" class="form-label">Tanggal Pendaftaran</label>
    <input type="date" name="registration_date" class="form-control"
        value="{{ old('registration_date', isset($registration) ? $registration->registration_date->format('Y-m-d') : date('Y-m-d')) }}"
        required>
</div>

<div class="mb-3">
    <label for="medrec_number" class="form-label">Pasien</label>
    <select name="medrec_number" id="medrec_number" class="form-select" required>
        <option value="">-- Pilih Pasien --</option>
        @foreach ($patients as $patient)
            <option value="{{ $patient->medrec_number }}"
                {{ old('medrec_number', $registration->medrec_number ?? '') == $patient->medrec_number ? 'selected' : '' }}>
                {{ $patient->medrec_number }} - {{ $patient->name }}
            </option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-success">Simpan</button>
<a href="{{ route('registrations.index') }}" class="btn btn-secondary">Kembali</a>