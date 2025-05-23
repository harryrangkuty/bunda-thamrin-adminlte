<section>
    <div class="mb-4">
        <p class="text-light">
            Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.
        </p>
    </div>
    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">Kata Sandi Saat Ini</label>
            <input type="password" id="update_password_current_password" name="current_password" class="form-control @error('current_password', 'updatePassword') is-invalid @enderror" autocomplete="current-password">
            @error('current_password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="update_password_password" class="form-label">Kata Sandi Baru</label>
            <input type="password" id="update_password_password" name="password" class="form-control @error('password', 'updatePassword') is-invalid @enderror" autocomplete="new-password">
            @error('password', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
            <input type="password" id="update_password_password_confirmation" name="password_confirmation" class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror" autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex align-items-center gap-2">
            <button type="submit" class="btn btn-primary">Ubah</button>
            @if (session('status') === 'password-updated')
                <span class="text-success ms-2" id="password-updated-message">Tersimpan.</span>
                <script>
                    setTimeout(() => {
                        const msg = document.getElementById('password-updated-message');
                        if (msg) msg.style.display = 'none';
                    }, 2000);
                </script>
            @endif
        </div>
    </form>
</section>
