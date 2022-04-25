@extends('layout.dashboard')

@section('content')
    @foreach($ad as $info)
        @if(Auth::id()==$info->user_id||Auth::user()->admin)
            <form action='{{route('UpdateAd1')}}' method='POST' enctype="multipart/form-data">
            <div class="login-form">
                <div class="cotainer">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <div class="card">
                                <h3 class="card-header text-center">Updating Ad {{$info->title}}</h3>
                                <div class="card-body">
                                    @if (session('errors'))
                                        <span class="text-danger">{{session('errors')}}</span>
                                    @endif
                                    <form action='{{route('createNewAd')}}' method='POST' enctype="multipart/form-data">
                                        @csrf
                                        <input type='hidden' name='user_id' value="{{Auth::id()}}">
                                        <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" value="{{$info->title}}" name='title'>
                                        <label for="floatingInput">title</label>
                                        </div>
                                        <div class="form-floating">
                                        <textarea class="form-control" id="floatingTextarea2" style="height: 100px" name="description">{{$info->description}}</textarea>
                                        <label for="floatingTextarea2">Description</label>
                                        </div>
                                        <label for='category'>Location</label>
                                        <select class="form-select" aria-label="Default select example" id='lecoation' name='location_id'>
                                            @foreach($locations as $location)
                                                <option value={{$location->id}}>{{$location->location}}</option>
                                            @endforeach
                                        </select>
                                        <label for='location'>Category</label>
                                        <select class="form-select" aria-label="Default select example" id='category' name='cat_id'><br/>
                                            @foreach($categories as $category)
                                                <option value={{$category->id}}>{{$category->category}}</option>
                                            @endforeach
                                        </select>
                                        <label for='usure'>Usure</label>
                                        <select class="form-select" aria-label="Default select example" id='usure' name='usure'>
                                            <option value='BrandNew'>BrandNew</option>
                                            <option value='Used'>Used</option>
                                            <option value='Broken'>Broken</option>
                                        </select>
                                        <label for='price'>Price</label><br/>
                                        <input class="form-control" type='number' id='price' name='price' value='{{$info->price}}'>
                                        <div class="mb-3">
                                        <label for="formFile" class="form-label">Picture</label>
                                        <input class="form-control" type="file" id="formFile">
                                        </div>
                                        <div class="d-grid mx-auto">
                                            <button type="submit" class="btn btn-dark btn-block">update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        @else
            <div class="alert alert-danger" role="alert">
                <h1 class="text-center">You can't update this ad</h1>

            </div>
        @endif
    @endforeach
    
@endsection