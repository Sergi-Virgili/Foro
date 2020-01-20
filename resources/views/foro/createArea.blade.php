@extends('../layouts.foro')

@section('content')
<body>
<header>
    <div class="title">Forum</div>
</header>
    <div class="areaTitle">Area51</div>
<main>
    <form method="POST" action="/foro"  role="form">
		{{ csrf_field() }}
        <label for="name">Name</label><br>
        <input type="text" name="name" value="" required><br>
        <label for="description">Description</label><br>
        <input type="text" name="description" value="" required><br>
        <input type="submit" value="Create">
    </form>
</main>
</body>
@endsection