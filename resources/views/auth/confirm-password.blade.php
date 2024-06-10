<x-guest-layout>
    <div class="mb-4 text-muted">
        {{ __('Ini adalah area aman dari aplikasi. Harap konfirmasi kata sandi Anda sebelum melanjutkan.') }}
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Kata Sandi') }}</label>
            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
            @if ($errors->has('password'))
                <div class="text-danger mt-2">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Konfirmasi') }}
            </button>
        </div>
    </form>
</x-guest-layout>
