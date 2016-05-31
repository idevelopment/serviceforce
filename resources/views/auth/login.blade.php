@extends('layouts/welcome')

@section('content')

<div class="login-page">
            <div class="panel panel-color panel-default login-panel">
                <div class="panel-heading"> 
                    <h4 class="text-center">Sign in to <strong>ServiceForce</strong></h4>
                </div> 


                <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                     <div class="col-xs-12">
                      <input type="password" name="password" placeholder="Password" class="form-control">
                     </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="checkbox checkbox-primary">
                                <input type="checkbox" id="checkbox-signup" name="remember">
                                <label for="checkbox-signup">
                                    Remember me
                                </label>
                            </div>
                            
                        </div>
                    </div>
                    
                    <div class="form-group text-center">
                        <div class="col-xs-12">
                            <button class="btn  btn-default" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-7">
                            <a href="{{ url('password/reset')}}"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                        </div>
                    </div>
                </form> 
                </div>                                 
                
            </div>
        </div>
@endsection
