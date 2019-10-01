@extends('../layouts.app')

@section('content')
    <h1>Estos son los temas del foro</h1>
    <ul>
    @foreach ($temas as $tema)
    <li> id : {{$tema->id}},
    <strong>titulo:</strong> <a href="/foro/tema/{{$tema->id}}">{{$tema->title}} </a>
        <strong>usuario</strong> {{$tema->user->name}}
        <strong>area</strong> {{$tema->area->name}}
        <p>Respuestas: {{$tema->responses->Count()}}</p>
        <form action="/foro/tema/{{$tema->id}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="ELIMINAR">
        </form>
        <form action="/foro/tema/{{$tema->id}}/edit" method="GET">


            <input type="submit" value="EDITAR">
        </form>
    </li>

    @endforeach
    </ul>
    <a href="/foro/temas/crear">ABRE UN HILO NUEVO</a>

@endsection
