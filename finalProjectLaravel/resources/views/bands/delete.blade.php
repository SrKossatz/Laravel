@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Excluir Banda: {{ $band->name }}</h2>
    <form action="{{ route('bands.delete', $band->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <p>Tem certeza que deseja excluir a banda {{ $band->name }}?</p>

        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>

@endsection
