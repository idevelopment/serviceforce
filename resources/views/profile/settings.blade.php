@extends('layouts.app')

@section('content')
    <div class="col-sm-12 col-md-11 col-lg-8 col-lg-offset-2">

<div class="panel panel-default">
  <div class="panel-heading">Profile Management</div>
  <div class="panel-body">
  <form class="form-horizontal">
      <div class="form-group">
    <label for="fname" class="col-sm-2 control-label">First name</label>
    <div class="col-sm-6">
      <input type="text" id="fname" name="fname" class="form-control">
    </div>
  </div>

    <div class="form-group">
    <label for="name" class="col-sm-2 control-label">Name</label>
    <div class="col-sm-6">
      <input type="text" id="name" name="name" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-6">
      <input type="email" id="email" name="email" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-6">
      <input type="password" id="password" name="password" class="form-control">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>
  </div>
 </div>
</div>
</div>

@endsection