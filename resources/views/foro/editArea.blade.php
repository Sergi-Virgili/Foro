@extends('../layouts.app')

@section('content')
<body>
<header>
    <div class="title">Forum</div>
</header>
    <div class="areaTitle">Area51</div>
<main>
    <form method="POST" action="/foro/area/{{$area->id}}"  role="form">
        @csfr
        @method('put')
        {{ csrf_field() }}
        <label for="name">Name</label><br>
        <input type="text" name="name" value="{{$area->name}}" required><br>
        <label for="description">Description</label><br>
        <input type="text" name="description" value="{{$area->description}}" required><br>
        <input type="submit" value="Save">
    </form>
</main>
</body>
@endsection