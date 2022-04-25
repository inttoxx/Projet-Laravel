@extends('layout.dashboard')

@section('content')
<h1 class="text-center">Ads managment</h1>
<table class="table table-striped table-hover">
    <thead>
    <tr>
        <td>ID</td>
        <td>Title</td>
        <td>Category</td>
        <td>Location</td>
        <td>Description</td>
        <td>Price</td>
        <td>Created by</td>
        <td>Update</td>
        <td>Delete</td>
    </tr>
    </thead>
    <tbody>
        @foreach ($Ads as $ad)
            <tr>
                <td>{{$ad->id}}</td>
                <td>{{$ad->title}}</td>
                <td>{{$ad->category['category']}}</td>
                <td>{{$ad->location['location']}}</td>
                <td>{{$ad->description}}</td>
                <td>{{$ad->price}}</td>
                <td>{{$ad->user['nickname']}}</td>
                <td><a class="btn btn-primary" href='{{route('updAd1',['id'=>$ad->id])}}'>Update</a></td>
                <td><a class="btn btn-danger" href='{{route('delAds',['id'=>$ad->id])}}'>Delete</a></td>
            </tr>
        @endforeach
    </tbody>
</table>


@endsection