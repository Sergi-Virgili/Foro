<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista Temas del foro</title>
</head>
<body>
    <h1>Estos son los temas del foro</h1>
    <ul>
    @foreach ($temas as $tema)
    <li> id : {{$tema->id}}, <strong>titulo:</strong> {{$tema->title}} <strong>usuario</strong> {{$tema->user_id}} <strong>area</strong> {{$tema->area_id}} 
        <form action="/foro/{{$tema->id}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="borrar">
        </form>
    </li>
        
    @endforeach
    </ul>
    <a href="/foro/temas/crear">ABRE UN HILO NUEVO</a>
    

</body>
</html>