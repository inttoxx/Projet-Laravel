@extends('layout.dashboard')

@section('content')

<h1 class="text-center">My Ads</h1>
@if($ads->count()>0)
    <div class="d-flex flex-wrap">
        @foreach($ads as $ad)
            <article class="card" style="width: 15rem; height: 36rem; margin: 10px;">
                <a href='{{route('show',['id'=>$ad->id])}}'><img class="card-img-top" alr='{{$ad->title}}' src='/images/{{$ad->id.'.'.$ad->picture_extension}}' height="200px"></a>
                <div class="card-body">
                    <h1 class="card-title">{{$ad->title}}</h1>
                    <h1 class="card-title">{{$ad->title}}</h1>
                    <p class="card-text">Category : {{$ad->category['category']}}</p>
                    <b class="card-text">Location : {{$ad->location['location']}}</b>
                    <p class="card-text">{{$ad->usure}}</p>
                    <p class="card-text">Posted by {{$ad->user['nickname']}}</p>
                    <h3 class="btn btn-success">{{$ad->price}}$</h3>
                    <br/><div class="d-flex justify-content-between">
                    <a class="btn btn-primary" href='{{route('updAd1',['id'=>$ad->id])}}'>Update</a><a class="btn btn-danger" href='{{route('delAds',['id'=>$ad->id])}}'>Delete</a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>
    <p class="text-center"><a class='btn btn-info' href='{{route('NewAd')}}'>Post a New Ad !</a></p>
@else
    <h2 class="text-center">No Ads for the moment</h2>
    <p class="text-center"><a class='btn btn-info' href='{{route('NewAd')}}'>Post your first Ad !</a></p>
    
@endif

@endsection