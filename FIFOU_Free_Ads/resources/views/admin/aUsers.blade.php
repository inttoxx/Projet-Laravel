@extends('layout.dashboard')

@section('content')
<h1 class="text-center">Users managment</h1>
<table class="table table-striped table-hover">
    <thead>
        <tr>        
            <td>ID</td>
            <td>Name</td>
            <td>Nickname</td>
            <td>Email</td>
            <td>Phone Number</td>
            <td>Admin</td>
            <td>Update</td>
            <td>Delete</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->nickname}}</td>    
                <td>{{$user->email}}</td>
                <td>{{$user->phone_number}}</td>
                <td>{{$user->admin}}</td>
                <td><a class="btn btn-primary" href='{{route('updUser',['id'=>$user->id])}}'>Update</a></td>
                <td><a class="btn btn-danger" href='{{route('delUser',['id'=>$user->id])}}'>Delete</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

<a class="btn btn-success" href='{{route('newUser')}}'>ADD NEW USER</a>

@endsection