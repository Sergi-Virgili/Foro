@extends('../layouts.app')

@section('content')
    <div class="card p-4 m-2">
    <h1>{{$theme->title}}</h1>
    @if (Auth::user())
        <a href="/foro/tema/{{$theme->id}}/edit">editar</a>
    @endif
    <h2>Area: {{$theme->area->name}}</h2>
    <p>Hilo abierto por: {{$theme->user->name}}</p>    
    <p>Creado el: {{$theme->created_at}} </p>
    <p>Modificado el: {{$theme->updated_at}} </p>

    
    <p>{{$theme->content}}</p>

    @if (Auth::user())

        <a href="#" onClick="toggleForm(['formResponse'])">Responder hilo</a>
        {{-- FROM DE RESPUESTA DEL HILO --}}
        
        <form id="formResponse" class = "container hidden" action="/foro/response" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                    <label for="content">Texto Respuesta</label>
                    <textarea class="form-control" required id="content" name="content" rows="3"></textarea>
            </div>
            <input type="submit" class="btn btn-outline-success" value="Responder">
            <input type="hidden" name="theme_id" value= {{$theme->id}}>

        </form>
    @endif
    </div>

    <h3>Respuestas</h3>
    @foreach ($theme->responses as $response )
        <div class="card p-4 m-2">
            <div class="container">
            <a href="/foro/user/{{$response->user->id}}"><strong>{{$response->user->name}}</strong></a>
             <div id="response_content-{{$response->id}}">{{$response->content}}</div>

             @if (Auth::user())
                 
             <div id = "response_edit_form-{{$response->id}}" class="hidden">
                    <form action="/foro/response/{{$response->id}}" method="post">
                        @csrf
                        @method('PUT') 
                        
                        <div class="form-group">
                            
                        <textarea class="form-control" required id="content" name="content" rows="3">{{$response->content}}</textarea>
                        </div>
                        <a id="response_cancel_button-{{$response->id}}" onclick="toggleForm(['response_edit_form-{{$response->id}}',
                                'response_content-{{$response->id}}',
                                'response_edit_button-{{$response->id}}',
                                
                                ])" 
                                class="btn btn-outline-success mt-4">
                                CANCELAR
                        </a>
                        <input type="submit" value="OK" class = "btn btn-outline-success mt-4">
                    </form>
                    <form method="POST" action="/foro/storage/create" accept-charset="UTF-8" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @csrf
                        <div class="form-group">
                            <label class="control-label">Nuevo Archivo</label>
                            <div class="">
                                <input type="file" class="form-control" name="file" >
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>

             <form action="/foro/response/{{$response->id}}" method="post">
                @csrf
                @method('DELETE') 
                <input type="submit" value="ELIMINAR" class = "btn btn-outline-danger mt-4">
            </form>
            <button id="response_edit_button-{{$response->id}}" onclick="toggleForm(['response_edit_form-{{$response->id}}',
                'response_content-{{$response->id}}',
                'response_edit_button-{{$response->id}}'])" 
                class="btn btn-outline-success">
                EDITAR
            </button>
            @endif
            
            </div>
        </div>
    @endforeach

    <script>
    function toggleForm(tags) {
        
        tags.forEach(tag => {
            let formResponse = document.getElementById(tag);
            formResponse.classList.toggle('hidden');
        });
       
    }
    </script>
@endsection
