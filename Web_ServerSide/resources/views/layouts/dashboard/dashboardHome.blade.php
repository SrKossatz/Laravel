@extends('layouts.femaster')

@section('content')
    <h1>
        Olá, @auth
            {{ Auth::user()->name }}
        @endauth estás no Back Office

        @auth

        @if($message)

            <div class="alert alert-success">
                <h4>Conta administrador</h4>
            </div>
        @endif

        @endauth
    </h1>
@endsection
