@extends('home')
@section('account')
    <form method="POST" action="{{ route('pass.update') }}">
        @csrf
        <div class="row mb-3">
            <label for="password"
                   class="col-md-4 col-form-label text-md-end">{{ __('Old Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="old_pass" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm"
                   class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control"
                       name="new_pass" required autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-light">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
@endsection
