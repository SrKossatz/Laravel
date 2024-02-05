@extends('layouts.femaster')
@section('content')
    {{-- <h3>Olá, sou users</h3>

    <p>{{ $hello }}</p>
    <p>{{ $helloAgain }}</p>
    <p>{{ $daysOfWeek[2] }}</p>
    <p>{{ $info['name'] }}</p>
    <p>{{ $info[0][2] }}</p> --}}

    @if (session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif




    <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Email</th>
          </tr>
        </thead>

        <tbody>
            @foreach ($users as $user)

          <tr>
            <th>{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->email}}</td>
            {{-- o botão é carregado pelo link e leva consigo o userID --}}
            <td><a href="{{route('users.view', $user->id)}}" class="btn btn-info">Ver/Atualizar</a></td>
            <td><a href="{{ route('users.delete', $user->id) }}" class="btn btn-danger">Delete</a></td>

          </tr>
          @endforeach
        </tbody>
      </table>


@endsection
