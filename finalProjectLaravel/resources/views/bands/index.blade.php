@extends('layouts.app')

@section('content')
    <div class="container">


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Albuns</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bands as $band)
                    <tr>
                        <td>
                            {{ $band->id }}
                        </td>
                        <td>
                            {{ $band->name }}
                        </td>
                        <td>
                            <img src="{{ asset('storage/' . $band->photo) }}" alt="{{ $band->name }}"
                                style="max-width: 100px;">
                        </td>
                        <td>
                            @foreach ($band->albums as $album)
                                {{ $album->name }}
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('bands.show', $band->id) }}" class="btn btn-primary btn-sm my-1">Ver</a>
                        </td>
                        <td>
                            <a href="{{ route('bands.edit', $band->id) }}" class="btn btn-primary btn-sm my-1">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('bands.delete', $band->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm my-1"
                                    onclick="return confirm('Tem certeza que deseja excluir esta banda?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
