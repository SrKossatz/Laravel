@extends('layouts.femaster')

@section('content')

<h1>Ver / Atualizar tarefa {{$myTask->name}}</h1>



<form method="POST" action="{{ route('tasks.update') }}">
    @csrf
    <input type="hidden" name="id" value={{$myTask->id}}>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nome</label>
        <input type="texto" value="{{ $myTask->name }}" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nome"
            required>
        @error('name')
            <div class="alert alert-danger">
                O nome que colocou não segue os requisitos.
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Descrição</label>
        <input type="text" value="{{ $myTask->description }}"" name="description" class="form-control" id="exampleFormControlInput1" placeholder=""
            required>
        @error('description')
            <div class="alert alert-danger">
                A descrição não segue os requisitos.
            </div>
        @enderror
    </div>
    <div class="mb-3">

        <select class="custom-select" name="user_id" required>
            <option selected disabled>Users</option>
            @foreach ($users as $item)
                <option @if ($item->id == request()->query('user_id')) selected @endif value="{{ $item->id }}">
                    {{ $item->name }}</option>
            @endforeach
        </select>

    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
</form>

@endsection
