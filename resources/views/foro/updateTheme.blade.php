@extends('../layouts.foro')

@section('content')
{{$theme->area->name}}
<h1>Edit Hilo</h1>
<form action="/foro/tema/{{$theme->id}}" method="post" accept-charset="UTF-8" enctype="multipart/form-data">
      @csrf
      @method('PUT')
    {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Título del Hilo</label>
            <input class="form-control" type="text" name="title" value="{{$theme->title}}">
        </div>
        <div class="form-group">
                <label for="area">Selecciona Area</label>
        {{-- TODO: area seleccionada --}}
        <select class="form-control" id="area_id" name="area_id" value="{{$theme->area->id}}">
                @foreach ($areas as $area)
                        <option value="{{$area->id}}" 
                                @if ($area->id == $theme->area->id) selected @endif>
                                {{$area->name}}
                        </option>
                @endforeach
                       
                  
                </select>
        </div>
        <div class="form-group">
                <label for="postText">Texto</label>
        <textarea class="form-control" id="postText" name="content" rows="3">{{$theme->content}}</textarea>
        </div>
        <div class="form-group">
                <label for="category">Vinculado a Categorías</label>
                <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                        <label class="form-check-label" for="inlineCheckbox1">1</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                        <label class="form-check-label" for="inlineCheckbox2">2</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option3" disabled>
                        <label class="form-check-label" for="inlineCheckbox3">3 (disabled)</label>
                      </div>
        </div>
        @foreach ($theme->files as $file)
                <a href="{{url('/foro/storage',$file->imagen_nombre)}}">{{$file->imagen_nombre}}</a>
                <form action="/foro/file/{{$file->id}}" method="post">
                    @csrf
                    @method('DELETE') 
                <input type="submit" value="ELIMINAR" class = "btn btn-outline-danger mt-4">
                </form>
        @endforeach
        @foreach ($theme->images as $image)
                <img src="{{url('foro/storage',$image->image_name)}}">
                <form action="/foro/image/{{$image->id}}" method="post">
                    @csrf
                    @method('DELETE') 
                <input type="submit" value="ELIMINAR" class = "btn btn-outline-danger mt-4">
                </form>
        @endforeach
        <div class="form-group">
            <label class="col-md-4 control-label">Nuevo Archivo</label>
            <div class="col-md-6">
            <input type="file" class="form-control" name="file" >
            </div>
        </div>
        <div class="form-group">
                <label class="control-label">Nueva Imagen</label>
                <div class="">
                <input type="file" class="form-control" name="image" >
                </div>
        </div>
        <button type="submit" class="btn btn-primary">PUBLICAR</button>
    </form>

@endsection