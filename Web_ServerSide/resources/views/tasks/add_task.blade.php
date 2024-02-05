@extends('layouts.femaster')

@section('content')
    <br>
    <h2>Olá, aqui podes Adicionar Tarefas</h2>
    <br>


    <form method="POST" action="{{ route('tasks.create') }}">
        @csrf

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nome</label>
            <input type="texto" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nome"
                required>
            @error('name')
                <div class="alert alert-danger">
                    O nome que colocou não segue os requisitos.
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Descrição</label>
            <input type="text" name="description" class="form-control" id="exampleFormControlInput1" placeholder=""
                required>
            @error('description')
                <div class="alert alert-danger">
                    A descrição que colocou não segue os requisitos.
                </div>
            @enderror
        </div>
        <div class="mb-3">

            <select class="custom-select" name="user_id">
                <option selected> Todos os Users</option>
                @foreach ($users as $item)
                    <option @if ($item->id == request()->query('user_id')) selected @endif value="{{ $item->id }}">
                        {{ $item->name }}</option>
                @endforeach
            </select>

        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <br>
    <a class="btn btn-success" href="{{ route('tasks.all') }}">Voltar</a>
    <br>
    </div>
@endsection
