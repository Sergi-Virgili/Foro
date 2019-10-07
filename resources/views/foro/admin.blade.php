@extends('../layouts.app')

@section('content')

<h2>Administrar Foro</h2>
Buscar Usuario <input type="text" id='userSearchInput' onkeyup="userSearch()">

@foreach ($permissions as $permission)
<h3>{{$permission->name}}</h3>
    @foreach ($permission->users as $user)
    <li>{{$user->name}}</li> <a href="">xdel moderator</a>
    @endforeach
@endforeach
<h3>Users</h3>
@foreach ($users as $user)
<li>
    {{$user->name}}
</li>
<a href="">add Moderator</a>
   
@endforeach

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