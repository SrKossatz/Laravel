@extends('layouts.femaster')

@section('content')
    <br>
    <h2>Olá, aqui podes Adicionar Tarefas</h2>
    <br>


    <form method="POST" action="{{ route('tasks.create') }}">
        @csrf

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nome</label>
            <input type="texto" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nome" required>

            @error('name')
                <div class="alert alert-danger">
                    Nome inválido.
                </div>
            @enderror

        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Descrição</label>
            <input type="number" name="description" class="form-control" id="exampleFormControlInput1" placeholder=""
                required>

            @error('description')
                <div class="alert alert-danger">
                    Descrição inválida.
                </div>
            @enderror

        </div>
        <div class="mb-3">
            {{-- <label for="exampleFormControlInput1" class="form-label">User ID</label> --}}
            <select class="custom-select" name="user_id">
                <option selected> Todos os Users</option>
                @foreach ($users as $user)
                    <option @if ($user->id == request()->query('user_id')) selected @endif value="{{ $user->id }}">
                        {{ $user->name }}</option>
                @endforeach
            </select>

            @error('user_id')
                <div class="alert alert-danger">
                    User inválido.
                </div>
            @enderror

        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <br>
    <a class="btn btn-success" href="{{ route('tasks.all') }}">Voltar</a>
    <br>
    </div>
@endsection
