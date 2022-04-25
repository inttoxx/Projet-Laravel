@extends('layout.dashboard')

@section('content')

<h1 class="text-center">Admin Center</h1>
<div class="row">
    <div class="col">
    <a class="btn btn-primary" href='{{route('aCategory')}}'>Categories managment</a>
    </div>
    <div class="col">
    <a class="btn btn-success" href='{{route('aLocations')}}'>Locations managment</a>
    </div>
    <div class="col">
    <a class="btn btn-warning" href='{{route('adminUser')}}'>Users managment</a>
    </div>
    <div class="col">
    <a class="btn btn-info" href='{{route('aAds')}}'>Ads managment</a>
    </div>
</div>

@endsection