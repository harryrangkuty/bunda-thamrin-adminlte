<section class="mb-5">
    <div class="mb-3">
        <h4 class="text-danger">{{ __('Hapus Permanen Akun') }}</h4>
        <p class="text-light">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan datanya akan dihapus secara permanen. Sebelum menghapus akun Anda, silakan unduh data atau informasi apa pun yang ingin Anda simpan.') }}
        </p>
    </div>
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
        Hapus Akun
    </button>
    <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog"
        aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="password" class="sr-only">{{ __('Kata Sandi') }}</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                                placeholder="{{ __('Password') }}" required>
                            @error('password', 'userDeletion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ __('Batalkan') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Hapus Akun') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>