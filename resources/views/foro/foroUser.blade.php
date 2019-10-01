@extends('../layouts.app')
@section('content')




<h1>Hilos de {{$user->name}}</h1>

    @foreach ($user->themes as $theme)
        <div class="card">
            {{$theme->title}}
        </div>
    @endforeach
    



@endsection