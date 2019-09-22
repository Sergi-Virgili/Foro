@extends('../layouts.app')

@section('content')

    <h1>{{$theme->title}}</h1>
    <h2>Area:{{$theme->area_id}}</h2>
    <ul>
        <li>usuario</li>
        <li>Creado el: {{$theme->created_at}} </li>
        <li>Modificado el: {{$theme->updated_at}} </li>

    </ul>
    <p>{{$theme->content}}</p>
    <a href="">contestar</a>
    <a href="/foro/tema/{{$theme->id}}/edit">editar</a>

    <h3>Respuestas</h3>
    @foreach ($theme->responses as $response )
         {{$response->content}}
    @endforeach


@endsection
