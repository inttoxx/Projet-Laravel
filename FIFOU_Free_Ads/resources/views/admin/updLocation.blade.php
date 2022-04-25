@extends('layout.dashboard')

@section('content')

<div class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Update Location</h3>
                    <div class="card-body">
                        @if (session('errors'))
                            <span class="text-danger">{{session('errors')}}</span>
                        @endif
                        <form action='{{route('updateLoc')}}' method='POST'>
                            @csrf
                            @foreach($location as $loc)
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" value="{{$loc->location}}" name='location'>
                                <label for="floatingInput">Location Name</label>
                            </div>
                                <input type="hidden" name='id' value='{{$loc->id}}'>
                            @endforeach
                            <div class="d-grid mx-auto">
                                <input class="btn btn-dark btn-block" type='submit' value='Update'>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection