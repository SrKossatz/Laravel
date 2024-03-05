@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <h2>Criar Álbum</h2>
            <form action="{{ route('albums.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="band_id">Banda</label>
                    <select name="band_id" id="band_id" class="form-control">
                        @foreach ($bands as $band)
                            <option value="{{ $band->id }}">{{ $band->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Nome do Álbum</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="release_date">Data de Lançamento</label>
                    <input type="date" class="form-control" id="release_date" name="release_date" required>
                </div>
                <div class="form-group">
                    <label for="image">Imagem</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Criar Álbum</button>
            </form>
        </div>
@endsection
