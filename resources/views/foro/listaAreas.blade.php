@extends('../layouts.app')

@section('content')
    <h1>Estos son los temas del foro</h1>
    <ul>
    @foreach ($areas as $tema)
    <li> id : {{$area->id}},
    <strong>titulo:</strong> <a href="/foro/area/{{$area->id}}">{{$area->title}} </a>
        <strong>usuario</strong> {{$tema->user_id}}
        <strong>area</strong> {{$tema->area_id}}
        <form action="/foro/tema/{{$tema->id}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class = "btn btn-danger" value="ELIMINAR">
        </form>
        <form action="/foro/tema/{{$tema->id}}/edit" method="GET">


            <input type="submit" value="EDITAR">
        </form>
    </li>

    @endforeach
@endsection