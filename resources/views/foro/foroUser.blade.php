@extends('../layouts.foro')
@section('content')


{{-- @dd($themes); --}}

<h2>Hilos creados por: {{$user->name}}</h2>

    @foreach ($themes as $theme)
        <div class="card">
            <a href="/foro/tema/{{$theme->id}}">{{$theme->title}}</a>
        </div>
    @endforeach
    
<h2>Hilos donde colabora: {{$user->name}}</h2>

    {{-- @foreach ($response as $response)
        <div class="card">
            <a href="/foro/tema/{{$response->id}}">{{$theme->title}}</a>
        </div>
    @endforeach --}}

@endsection