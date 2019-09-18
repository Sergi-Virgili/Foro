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
    <li> {{$tema->id}}</li>
        <li>{{$tema->title}}</li>
        
    @endforeach
    </ul>
    

</body>
</html>