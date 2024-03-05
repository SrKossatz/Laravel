@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Álbum: {{ $album->name }}</h1>
    <form action="{{ route('albums.update', $album->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome do Álbum</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $album->name }}" required>
        </div>

        <div class="form-group">
            <label for="release_date">Data de Lançamento</label>
            <input type="date" class="form-control" id="release_date" name="release_date" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Álbum</button>
    </form>
</div>
@endsection
