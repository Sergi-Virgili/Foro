@extends('../layouts.app')

@section('content')


@foreach ($permissions as $permission)
{{$permission->name}}
    @foreach ($permission->users as $user)
    <li>{{$user->name}}</li>
    @endforeach
@endforeach

@foreach ($users as $user)
{{$user->name}}
    @foreach ($permissions as $permission)
    <li>{{$permission->where()name}}</li>
    @endforeach
@endforeach


<h2>Administrar Foro</h2>
Buscar Usuario <input type="text" id='userSearchInput' onkeyup="userSearch()">
{{-- @foreach ($permissions->users as $user)
    <div class="card">
        {{$user->name}} 
        
        
    </div>
@endforeach --}}

@foreach ($permissions as $permission)

    {{-- <li class="card">
    {{$permission->name}}
    </li>     --}}

@endforeach


<script>
    function userSearch() {
        let userSearchValue = document.getElementById('userSearchInput').value
        console.log(userSearchValue)
    }
</script>

@endsection