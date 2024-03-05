@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Adicionar Nova Banda</h2>

        <form action="{{ route('bands.insert.band') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome da Banda:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Foto da Banda:</label>
                <input type="file" class="form-control" id="photo" name="photo">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
@endsection
