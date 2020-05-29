@extends('frontend.layouts.auth_layout')
@section('title') Forgot Password @parent @endsection

@section('content')

    <div class="login-logo">
      <a href="#"><b>Laravel</b>STOCK</a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>
    
          <form action="recover-password.html" method="post">
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Request new password</button>
              </div>
              <!-- /.col -->
            </div>
          </form>
    
          <p class="mt-3 mb-1 text-center">
            <a href="{{url('login')}}">Login</a>
          </p>
          <p class="mb-0 text-center">
            <a href="{{url('register')}}" class="text-center">Register a new membership</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>

  @endsection
