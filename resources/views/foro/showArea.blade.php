@extends('../layouts.foro')

@section('content')
    <h1>Hilos del area {{$area->name}}</h1>
    
    @foreach ($area->themes as $tema)
    <div class="card p-4 mb-4"> 
    <div class="container mb-4">id : {{$tema->id}},
    <strong>titulo:</strong> <a href="/foro/tema/{{$tema->id}}">{{$tema->title}} </a>
        <strong>usuario</strong> <a href="/foro/user/{{$tema->user->id}}">{{$tema->user->name}}</a>
        <strong>area</strong> {{$tema->area->name}}
        <p>Respuestas: {{$tema->responses->Count()}}</p>
        @foreach ($tema->files as $file)
            <a href="{{url('/foro/storage',$file->imagen_nombre)}}">{{$file->imagen_nombre}}</a>
                <form action="/foro/file/{{$file->id}}" method="post">
                    @csrf
                    @method('DELETE') 
                    <input type="submit" value="ELIMINAR ARCHIVO" class = "btn btn-outline-danger mt-4">
                </form>
        @endforeach
    </div>
    @if (((Auth::user()) && (Auth::id() == $tema->user->id)) 
    || ((Auth::user()) && (App\ForoPermission::is_ForoAdmin(Auth::user()))))
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
    @endif
    </div>

    @endforeach
    @if (Auth::user())
    <a href="/foro/temas/crear">ABRE UN HILO NUEVO</a>
    @endif
    
    

@endsection
