<form method="GET" action="{{ route('admin.user.create') }}">
    @csrf
    <div class="row mb-3">
        <label style="font-size:18px;" for="name"
               class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text"
                   class="form-control @error('name') is-invalid @enderror" name="name"
                   value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label style="font-size:18px;" for="email"
               class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email"
                   class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}" required autocomplete="email">

            @error('email')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label style="font-size:18px;" for="password"
               class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password"
                   class="form-control @error('password') is-invalid @enderror"
                   name="password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label style="font-size:18px;" for="password-confirm"
               class="col-md-4 col-form-label text-md-end">Role</label>

        <div class="col-md-6">
            <select name="role_id" class="form-control">
                @foreach($roles as $part_roles)
                    @if($part_roles->id != 1 && $part_roles->id != 3)
                        <option value={{$part_roles->id}}>{{$part_roles->title}}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-light">
                {{ __('Register') }}
            </button>
        </div>
    </div>
</form>
