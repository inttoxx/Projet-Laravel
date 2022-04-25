@extends('layout.dashboard')

@section('content')

<div class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Create New Location</h3>
                    <div class="card-body">
                        @if (session('errors'))
                            <span class="text-danger">{{session('errors')}}</span>
                        @endif
                        <form action='{{route('createNewLoc')}}' method='POST'>
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Location Name" name='category'>
                                <label for="floatingInput">Location Name</label>
                            </div>
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