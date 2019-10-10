@extends('../layouts.foro')

@section('content')

<h2>Administrar Foro</h2>
Buscar Usuario <input type="text" id='userSearchInput' onkeyup="userSearch()">

@foreach ($permissions as $permission)
<h3>{{$permission->name}}</h3>
    @foreach ($permission->users as $user)
    <li>{{$user->name}}</li> 
    <form method="post" action="/foro/admin/{{$user->id}}/delete">
        @csrf
        
        @method('DELETE')
        <input type="submit" value='Quitar Moderador'>
    </form>
    @endforeach
@endforeach
<h3>Users</h3>
@foreach ($users as $user)
@if(!App\ForoPermission::is_ForoAdmin($user))
    <li class="card">
        {{$user->name}}
    </li>
    <form action="/foro/admin" method="post">
        {{ csrf_field() }}
    <input type="hidden" name="user_id" value= {{$user->id}}>
        <input type="submit" value="Hacer Moderador">
    </form>
@endif
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