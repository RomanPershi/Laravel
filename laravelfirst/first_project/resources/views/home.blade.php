@extends('layouts.main')
@section('foothead')
    <link rel="stylesheet" href="{{asset('css/account.css')}}">
    <div class="sign">
        @include('auth/slider')
                    @yield('account')
    </div>
@endsection
