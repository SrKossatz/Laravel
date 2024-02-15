@extends('layouts.femaster')

@if(Auth::user()->user_type == 1)
    <div class="alert alert-info" role="alert">
        Acesso Administrador
    </div>
    @endif

<h1>Bem-vindo, {{ Auth::user()->name }}</h1>
