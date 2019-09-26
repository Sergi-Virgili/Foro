@extends('../layouts.app')

@section('content')
<body>
<header>
    <div class="title">Areas</div>
</header>
<main>
    <ul class="Areas">
        @foreach ($areas as $area)
        <li><a href="/foro/{{$area->id}}/temas">{{$area->name}}</a></li>
        <li>{{$area->description}}</li>
        <div>
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
        @endforeach
    </ul>
    <a role="btn" class="btn" href="/foro/create" value="new area">Crear</a>
    
</main>
</body>
</html>

@endsection