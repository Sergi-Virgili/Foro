@extends('../layouts.app')

@section('content')

    <h1>{{$theme->title}}</h1>
    <a href="/foro/tema/{{$theme->id}}/edit">editar</a>
    <h2>Area:{{$theme->area_id}}</h2>
    <p>Hilo abierto por: {{$theme->user->name}}</p>    
    <p>Creado el: {{$theme->created_at}} </p>
    <p>Modificado el: {{$theme->updated_at}} </p>

    
    <p>{{$theme->content}}</p>
    <a href="#" onClick='openResponseForm()'>Responder hilo</a>
    {{-- FROM DE RESPUESTA DEL HILO --}}

    <form id="formResponse" action="/foro/response" method="POST" class="hidden">
        {{ csrf_field() }}
        <div class="form-group">
                <label for="content">Texto Respuesta</label>
                <textarea class="form-control" required id="content" name="content" rows="3"></textarea>
        </div>
        <input type="submit" value="Responder">
        <input type="hidden" name="theme_id" value= {{$theme->id}}>

    </form>


    <h3>Respuestas</h3>
    @foreach ($theme->responses as $response )
        <div class="card">
             {{$response->content}} 
             <form action="/foro/response/{{$response->id}}" method="post">
                @csrf
                @method('DELETE') 
                <input type="submit" value="ELIMINAR">
            </form>
        </div>
    @endforeach
    <script>
    function openResponseForm() {
        
        
        let formResponse = document.getElementById('formResponse');
        formResponse.classList.toggle('hidden');
    }
    </script>
@endsection
