@extends('layout.dashboard')

@section('content')
<h1 class="text-center">Categories managment</h1>
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Update</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->category}}</td>
                <td><a class="btn btn-primary" href='{{route('updCat',['id'=>$category->id])}}'>Update</a></td>
            </tr>
        @endforeach
    </tbody>
</table>

<a class="btn btn-success" href='{{route('newCat')}}'>ADD NEW CATEGORY</a>

@endsection