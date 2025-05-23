<section>
    <div class="mb-4">
        <p class="text-light mb-3">
            {{ __("Memperbarui informasi profil dan alamat email akun Anda.") }}
        </p>
    </div>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>
    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')
        <div class="form-group mb-3">
            <label for="name">{{ __('Nama') }}</label>
            <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="alert alert-warning mt-3">
                    <p class="mb-1">{{ __('Your email address is unverified.') }}</p>
                    <button form="send-verification" class="btn btn-sm btn-outline-primary">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                    @if (session('status') === 'verification-link-sent')
                        <p class="text-success mt-2 mb-0">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ __('Ubah') }}</button>
            @if (session('status') === 'profile-updated')
                <span class="text-success ml-3">{{ __('Tersimpan.') }}</span>
            @endif
        </div>
    </form>
</section>
