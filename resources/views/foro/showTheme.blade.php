@extends('../layouts.app')

@section('content')
    <h1>Imprimir el titulo</h1>
    <form action="/foro/temas" method="post">
    {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Título del Hilo</label>
           
@endsection