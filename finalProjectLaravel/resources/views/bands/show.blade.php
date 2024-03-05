@extends('layouts.app')

@section('content')

<h1>*Detalhes da banda*</h1>
<div class="container mt-4">
    <h1>{{ $band->name }}</h1>
    <div class="mb-3">
        <strong>Nome da Banda:</strong> {{ $band->name }}
    </div>
    @if($band->photo)
    <div class="mb-3">
        <strong>Foto:</strong>
        <img src="{{ asset('storage/' . $band->photo) }}" alt="{{ $band->name }}" class="img-fluid">
    </div>
    @endif
    <div class="mb-3">
        <strong>Número de Álbuns:</strong> {{ $band->albums->count() }}
    </div>
    <div class="mb-3">
        <a href="{{ route('bands.index') }}" class="btn btn-secondary">Voltar para a lista de bandas</a>
        <a href="{{ route('bands.edit', $band->id) }}" class="btn btn-primary">Editar</a>
    </div>
</div>
@endsection
