@extends('../layouts.app')

@section('content')
<body>
<header>
    <div class="title">Forum</div>
</header>
    <div class="areaTitle">Area51</div>
<main>
    <ul class="Areas">
        @foreach ($areas as $area)
        <li><a href="/foro/{{$area->id}}/temas">{{$area->name}}</a></li>
        <li>{{$area->description}}</li>
        <form method="GET" action="/foro/area/{{$area->id}}/edit">
            @csrf
            @method('get')
            <input type="submit" value="Edit">
        </form>
        <form method="POST" action="/foro/{{$area->id}}">
            @csrf
            @method('delete')
            <input type="submit" value="Delete">
        </form>
        @endforeach
    </ul>
    <a role="btn" class="btn" href="/foro/create" value="new area">Crear</a>
    
</main>
</body>
</html>

@endsection