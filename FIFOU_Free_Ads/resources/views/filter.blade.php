@extends('layout.dashboard')

@section('content')
    <div class="d-flex flex-wrap">
        @foreach($ads as $ad)
            <article class="card" style="width: 15rem; height: 29rem; margin: 10px;">
                <a href='{{route('show',['id'=>$ad->id])}}'><img class="card-img-top" alr='{{$ad->title}}' src='/images/{{$ad->id.'.'.$ad->picture_extension}}' height="200px"></a>
                <div class="card-body">
                    <h1 class="card-title">{{$ad->title}}</h1>
                    <p class="card-text">Category : {{$ad->category['category']}}</p>
                    <b class="card-text">Location : {{$ad->location['location']}}</b>
                    <p class="card-text">{{$ad->usure}}</p>
                    <p class="card-text">Posted by {{$ad->user['nickname']}}</p>
                    <h3 class="btn btn-success">{{$ad->price}}$</h3>
                </div>
            </article>
        @endforeach
    </div>
@endsection