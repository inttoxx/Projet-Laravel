@extends('layout.dashboard')

@section('content')
<div class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    @foreach($user as $info)
                    <h3 class="card-header text-center">Update User {{$info->id}}</h3>
                    <div class="card-body">
                        @if (session('errors'))
                            <span class="text-danger">{{session('errors')}}</span>
                        @endif
                        <form action='{{route('updateUser')}}' method='POST'>
                            @csrf
                            <div class="form-group mb-3">
                            <input class="form-control" type='text' name='name' id='name' value="{{$info->name}}">
                            </div>
                            <div class="form-group mb-3">
                            <input class="form-control" type='text' name='nickname' id='username' value="{{$info->nickname}}">
                            </div>
                            <div class="form-group mb-3">
                            <input class="form-control" type='email' name='email' id='email' value="{{$info->email}}">
                            </div>
                            <div class="form-group mb-3">
                            <input class="form-control" type='tel' id='phoneNbr' name='phone_number' value="{{$info->phone_number}}">
                            </div>
                            <div class="form-group mb-3">
                            <input class="form-control" type="hidden" name='id' value='{{$info->id}}'>
                            </div>

                            @if($info->admin==1)
                            <div class="form-check">
                            <input class="form-check-input" type='radio' id='isAdmin' name='admin' value='1' checked><label class="form-check-label" for='isAdmin'>Is admin</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type='radio' id='notAdmin' name='admin' value='0'><label class="form-check-label" for='notAdmin'>Not admin</label>
                            </div>
                            @else
                            <div class="form-check">
                            <input class="form-check-input" type='radio' id='isAdmin' name='admin' value='1' ><label class="form-check-label" for='isAdmin'>Is admin</label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type='radio' id='notAdmin' name='admin' value='0'checked><label class="form-check-label" for='notAdmin'>Not admin</label>
                            </div>
                            @endif
                            <div class="d-grid mx-auto">
                            <input class="btn btn-dark btn-block" type='submit' value='update'>
                            </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
