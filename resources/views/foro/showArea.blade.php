@extends('../layouts.app')

@section('content')
    <h1>Hilos del area {{$area->name}}</h1>
    
    @foreach ($area->themes as $tema)
    <div class="card p-4 mb-4"> 
    <div class="container mb-4">id : {{$tema->id}},
    <strong>titulo:</strong> <a href="/foro/tema/{{$tema->id}}">{{$tema->title}} </a>
        <strong>usuario</strong> <a href="/foro/user/{{$tema->user->id}}">{{$tema->user->name}}</a>
        <strong>area</strong> {{$tema->area->name}}
        <p>Respuestas: {{$tema->responses->Count()}}</p>
    </div>
    @if (Auth::user())
    <div class="container">
        <form method="POST" action="/foro/storage/create" accept-charset="UTF-8" enctype="multipart/form-data">
        {{ csrf_field() }}
        @csrf
        <div class="form-group">
            <label class="col-md-4 control-label">Nuevo Archivo</label>
            <div class="col-md-6">
            <input type="file" class="form-control" name="file" >
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
        </form>
        <form action="/foro/tema/{{$tema->id}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" class = "btn btn-outline-danger btn-sm" value="ELIMINAR">
        </form>
        <form action="/foro/tema/{{$tema->id}}/edit" method="GET">


            <input type="submit" class = "btn btn-outline-primary btn-sm" value="EDITAR">
        </form>
    </div>
    @endif
    </div>

    @endforeach
    
    <a href="/foro/temas/crear">ABRE UN HILO NUEVO</a>
    
    

@endsection
