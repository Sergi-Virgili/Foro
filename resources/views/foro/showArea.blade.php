@extends('../layouts.app')

@section('content')
    <h1>Hilos del area {{$area->name}}</h1>
    
    @foreach ($area->themes as $tema)
    <div class="card p-4 mb-4"> 
    <div class="container mb-4">id : {{$tema->id}},
    <strong>titulo:</strong> <a href="/foro/tema/{{$tema->id}}">{{$tema->title}} </a>
        <strong>usuario</strong> {{$tema->user->name}}
        <strong>area</strong> {{$tema->area->name}}
    </div>
    <div class="container">
        <form action="/foro/tema/{{$tema->id}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class = "btn btn-outline-danger btn-sm" value="ELIMINAR">
        </form>
        <form action="/foro/tema/{{$tema->id}}/edit" method="GET">


            <input type="submit" class = "btn btn-outline-primary btn-sm" value="EDITAR">
        </form>
    </div>
    </div>

    @endforeach
    
    <a href="/foro/temas/crear">ABRE UN HILO NUEVO</a>
    
    

@endsection
