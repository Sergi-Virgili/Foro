@extends('../layouts.foro')

@section('content')
    <div class="card p-4 m-2">
    <h1>{{$theme->title}}</h1>
    
    <h2>Area: {{$theme->area->name}}</h2>
    <p>Hilo abierto por: {{$theme->user->name}}</p>    
    <p>Creado el: {{$theme->created_at}} </p>
    <p>Modificado el: {{$theme->updated_at}} </p>

    <?php    
    function findLinkInText($text) {
        $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";

            if(preg_match($reg_exUrl, $text, $url)) {
                return preg_replace($reg_exUrl, "<a href=".$url[0]." target=_blank>".$url[0]."</a> ", $text);
            } 

            return $text;
}
?>          
            
    <?php echo findLinkInText($theme->content) ?>
    
        @if (((Auth::user()) && (Auth::id() == $theme->user->id)) 
        || ((Auth::user()) && (App\ForoPermission::is_ForoAdmin(Auth::user()))))
             <a href="/foro/tema/{{$theme->id}}/edit">editar</a>
            @endif
    
            @foreach ($theme->images as $image)
        <img src="{{url('/foro/storage',$image->image_name)}}">
        @if (((Auth::user()) && (Auth::id() == $theme->user->id)) 
        || ((Auth::user()) && (App\ForoPermission::is_ForoAdmin(Auth::user()))))
        <form action="/foro/image/{{$image->id}}" method="post">
            @csrf
            @method('DELETE') 
            <input type="submit" value="ELIMINAR" class = "btn btn-outline-danger mt-4">
        </form>
        @endif
    @endforeach

    @foreach ($theme->files as $file)
        <a href="{{url('/foro/storage',$file->imagen_nombre)}}">{{$file->imagen_nombre}}</a>
        @if (((Auth::user()) && (Auth::id() == $theme->user->id)) 
        || ((Auth::user()) && (App\ForoPermission::is_ForoAdmin(Auth::user()))))
        <form action="/foro/file/{{$file->id}}" method="post">
            @csrf
            @method('DELETE') 
            <input type="submit" value="ELIMINAR" class = "btn btn-outline-danger mt-4">
        </form>
        @endif
    @endforeach

    @if (Auth::user())

        <a href="#" onClick="toggleForm(['formResponse'])">Responder hilo</a>
        {{-- FROM DE RESPUESTA DEL HILO --}}
        
        <form id="formResponse" class = "container hidden" action="/foro/response" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                    <label for="content">Texto Respuesta</label>
                    <textarea class="form-control" required id="content" name="content" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label class="control-label">Nuevo Archivo</label>
                <div class="">
                    <input type="file" class="form-control" name="file" >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Nueva Imagen</label>
                <div class="">
                    <input type="file" class="form-control" name="image" >
                </div>
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
             <div id="response_content-{{$response->id}}"><?php echo findLinkInText($response->content)?></div>
            @foreach ($response->files as $file)
                <a href="{{url('/foro/storage',$file->imagen_nombre)}}">{{$file->imagen_nombre}}</a>
            @endforeach
            @foreach ($response->images as $image)
                <img src="{{url('/foro/storage',$image->image_name)}}">
            @endforeach

            @if (((Auth::user()) && (Auth::id() == $response->user->id)) 
            || ((Auth::user()) && (App\ForoPermission::is_ForoAdmin(Auth::user()))))

             <div id = "response_edit_form-{{$response->id}}" class="hidden">
                    <form action="/foro/response/{{$response->id}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 
                        <div class="form-group">
                        <textarea class="form-control" required id="content" name="content" rows="3">{{$response->content}}</textarea>
                        <div class="form-group">
                            <label class="control-label">Nuevo Archivo</label>
                            <div class="">
                                <input type="file" class="form-control" name="file" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nueva Imagen</label>
                            <div class="">
                                <input type="file" class="form-control" name="image" >
                            </div>
                        </div>
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
                    @foreach ($response->files as $file)
                    <form action="/foro/file/{{$file->id}}" method="post">
                        @csrf
                        {{ csrf_field() }}
                        @method('DELETE') 
                        <input type="submit" value="ELIMINAR ARCHIVO" class = "btn btn-outline-danger mt-4">
                    </form>
                    @endforeach
                    @foreach ($response->images as $image)                
                        <form action="/foro/image/{{$image->id}}" method="post">
                            @csrf
                            {{ csrf_field() }}
                            @method('DELETE') 
                            <input type="submit" value="ELIMINAR IMAGEN" class = "btn btn-outline-danger mt-4">
                        </form>
                    @endforeach
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
