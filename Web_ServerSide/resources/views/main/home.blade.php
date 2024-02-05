
@extends('layouts.femaster')
@section('content')
@section('content2')

<h3>Hello World, estamos nas Views</h3>
<p>Tens disponíveis estes links:</p>

<ul>
    <li><a href="{{route('bemvindos')}}">Vai para casa!</a></li>
    <li><a href="{{route('users.add')}}">Adicionar utilizadores!</a></li>
    <li><a href="{{route('users.all')}}">Todos utilizadores!</a></li>
    <li><a href="{{route('tasks.all')}}">Todas as tasks!</a></li>

</ul>

<h1>Dados do Cesae</h1>
<h2>Nome:</h2>
<p>{{$infoCesae['name']}}</p>
<h2>Morada:</h2>
<p>{{$infoCesae['address']}}</p>
<h2>Email:</h2>
<p>{{$infoCesae['email']}}</p>


@endsection

