@extends('layouts.app')


@section('content')
    <div class="container">
        <h1>Public page</h1>


        @if (Route::has('register'))
            <a class="btn btn-danger" href="{{ route('register') }}">{{ __('Register') }}</a>
        @endif
    </div>


@endsection