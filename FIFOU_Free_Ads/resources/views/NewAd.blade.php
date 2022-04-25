@extends('layout.dashboard')

@section('content')
<div class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">New Ad</h3>
                    <div class="card-body">
                        @if (session('errors'))
                            <span class="text-danger">{{session('errors')}}</span>
                        @endif
                        <form action='{{route('createNewAd')}}' method='POST' enctype="multipart/form-data">
                            @csrf
                            <input type='hidden' name='user_id' value="{{Auth::id()}}">
                            <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" placeholder="Ad name" name='title'>
                            <label for="floatingInput">title</label>
                            </div>
                            <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="description"></textarea>
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
                            <input class="form-control" type='number' id='price' name='price'>
                            <div class="mb-3">
                            <label for="formFile" class="form-label">Picture</label>
                            <input name="image" class="form-control" type="file" id="formFile">
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Post Your Ad !</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection