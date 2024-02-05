
@extends('layouts.femaster')
@section('content')
<h1>Aqui Vamos adicionar os utilizadores</h1>
<ul>
    <li><a href="{{route('users.add')}}">Adicionar</a></li>
</ul>

<div class="container">
    <br>
    <h2>Adicionar Utilizadores</h2>
    <br>


    <form method="POST" action="{{route('user.create')}}">
        {{-- validação para evitar o sql injection @csrf--}}
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nome</label>
            <input type="texto" value="{{old('name')}}" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Nome" required>
            @error('name')
            <p class="alert alert-danger">Nome inválido</p>
            @enderror
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" value="{{old('email')}}" name="email" class="form-control" id="exampleFormControlInput1" placeholder="email@exemplo.com" required>
            @error('email')
            <p class="alert alert-danger">Email já existe</p>
            @enderror
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" required>
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
    <br>
    <a class="btn btn-success" href="{{ route('home.index') }}">Voltar</a>
    <br>
    <br>

    </div>

@endsection

