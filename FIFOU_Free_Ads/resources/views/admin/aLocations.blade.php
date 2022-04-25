@extends('layout.dashboard')

@section('content')
<h1 class="text-center">Locations managment</h1>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Update</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($locations as $location)
            <tr>
                <td>{{$location->id}}</td>
                <td>{{$location->location}}</td>
                <td><a class="btn btn-primary" href='{{route('updLocation',['id'=>$location->id])}}'>Update</a></td>
            </tr> 
        @endforeach
    </tbody>
</table>

<a class="btn btn-success" href="{{route('newLocation')}}">ADD NEW LOCATION</a>

@endsection