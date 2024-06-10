<section>
    <header>
        <h2 class="h5 text-dark">
            {{ __('Perbarui Kata Sandi') }}
        </h2>

        <p class="mt-2 text-muted">
            {{ __('Pastikan akun Anda menggunakan kata sandi yang panjang dan acak untuk tetap aman.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label">{{ __('Kata Sandi Saat Ini') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
            @if ($errors->updatePassword->get('current_password'))
                <div class="text-danger mt-2">
                    {{ $errors->updatePassword->get('current_password')[0] }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label">{{ __('Kata Sandi Baru') }}</label>
            <input id="update_password_password" name="password" type="password" class="form-control" autocomplete="new-password">
            @if ($errors->updatePassword->get('password'))
                <div class="text-danger mt-2">
                    {{ $errors->updatePassword->get('password')[0] }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label">{{ __('Konfirmasi Kata Sandi') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
            @if ($errors->updatePassword->get('password_confirmation'))
                <div class="text-danger mt-2">
                    {{ $errors->updatePassword->get('password_confirmation')[0] }}
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-4">
            <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-muted"
                >{{ __('Tersimpan.') }}</p>
            @endif
        </div>
    </form>
</section>
