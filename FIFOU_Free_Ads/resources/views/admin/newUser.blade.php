@extends('layout.dashboard')

@section('content')
<div class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Register User</h3>
                    <div class="card-body">
                        @if (session('errors'))
                            <span class="text-danger">{{session('errors')}}</span>
                        @endif
                        <form action="{{ route('createNewUser') }}" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Name" id="name" class="form-control" name="name"
                                    required autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email_address" class="form-control"
                                    name="email" required autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control"
                                    name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="nickname" placeholder="nickname" id="nickname" class="form-control"
                                    name="nickname" required>
                            </div>
                            <div class="form-group mb-3">
                                <input type="phone_number" placeholder="phone_number" id="phone_number" class="form-control"
                                    name="phone_number" required>
                             </div>    
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label><input type="hidden" name="remember"> Remember Me</label>
                                </div>
                                <div class='radio'>
                                    <input type='radio' id='isAdmin' name='admin' value='1'><label for='isAdmin'>Is admin</label><br/>
                                    <input type='radio' id='notAdmin' name='admin' value='0'><label for='notAdmin'>Not admin</label><br/>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">CREATE NEW USER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection