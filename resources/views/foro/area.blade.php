@extends('../layouts.app')

@section('content')
<body>
<header>
    <div class="title">Areas</div>
</header>
<main>
   
        @foreach ($areas as $area)
            <div class="card p-4 mb-4">
                <div>
                    <a href="/foro/{{$area->id}}/temas">{{$area->name}}</a>
                </div>
                Hilos: {{$area->themes->Count()}}
                
                <div class="container">
                <div>{{$area->description}}</div>
                
                
                <form method="GET" action="/foro/area/{{$area->id}}/edit">
                    @csrf
                    @method('get')
                    <input type="submit" class="btn btn-outline-primary btn-sm " value="Edit">
                </form>
                <form method="POST" action="/foro/{{$area->id}}">
                    @csrf
                    @method('delete')
                    <input type="submit" class="btn btn-outline-danger btn-sm " value="Delete">
                </form>
                </div>
            </div>
        @endforeach
    
    <a role="btn" class="btn" href="/foro/create" value="new area">Crear</a>
    
</main>
</body>
</html>

@endsection