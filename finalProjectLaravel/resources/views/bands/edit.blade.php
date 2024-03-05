@extends('layouts.app')

@section('content')

<div class="container">

    <h2>Editar Banda: {{ $band->name }}</h2>
    <form action="{{ route('bands.update', $band->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome da Banda:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $band->name }}" required>
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Foto da Banda:</label>
            <input type="file" class="form-control" id="photo" name="photo">
            @if($band->photo)
                <img src="{{ asset('storage/' . $band->photo) }}" alt="Foto da Banda" class="img-fluid mt-2">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>

    <hr>
    <hr>

    <div class="content">

        <h2>Álbuns da Banda</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome do Álbum</th>
                    <th>Data de Lançamento</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($band->albums as $album)
                    <tr>
                        <td>{{ $album->name }}</td>
                        <td>
                            <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-primary btn-sm">Editar Album</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>

@endsection
