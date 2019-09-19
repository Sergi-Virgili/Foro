@extends('../layouts.app')

@section('content')
    
    <h1>{{$theme->title}}</h1>
    <ul>
        <li>usuario</li>
        <li>Creado el: {{$theme->created_at}} </li>
        <li>Modificado el: {{$theme->updated_at}} </li>
    
    </ul>
    <p>{{$theme->content}}</p>
    <a href="">contestar</a>
    <a href="">editar</a>
           
@endsection