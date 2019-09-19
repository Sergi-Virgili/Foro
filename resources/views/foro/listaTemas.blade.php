@extends('../layouts.app')

@section('content')
    <h1>Estos son los temas del foro</h1>
    <ul>
    @foreach ($temas as $tema)
    <li> id : {{$tema->id}}, 
    <strong>titulo:</strong> <a href="/foro/tema/{{$tema->id}}">{{$tema->title}} </a>
        <strong>usuario</strong> {{$tema->user_id}} 
        <strong>area</strong> {{$tema->area_id}} 
        <form action="/foro/{{$tema->id}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="borrar">
        </form>
    </li>
        
    @endforeach
    </ul>
    <a href="/foro/temas/crear">ABRE UN HILO NUEVO</a>
    
@endsection