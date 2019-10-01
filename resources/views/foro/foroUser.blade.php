@extends('../layouts.app')
@section('content')




<h2>Hilos creados por: {{$user->name}}</h2>

    @foreach ($user->themes as $theme)
        <div class="card">
        <a href="/foro/tema/{{$theme->id}}">{{$theme->title}}</a>
        </div>
    @endforeach
    
<h2>Hilos donde colabora: {{$user->name}}</h2>


@endsection