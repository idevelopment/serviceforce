@extends('layouts.app')
@section('content')

<form action="{{ url('webhosting/lookup') }}" method="GET" class="form-horizontal">
 <div class="page-header">
      <h1>Search webhosting</h1>
    </div>
    <input type="hidden" name="operation" value="and">
    <div class="row">
      <div class="col-sm-6">
        <div class="row">
          <div class="col-sm-12 col-md-11 col-lg-9 col-lg-offset-1">
           <div class="form-group">
            <label for="name" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Domain name</label>
             <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
              <input type="text" id="name" name="name" class="form-control">
              <div class="input-group-addon">
               <span class="help-inline">
                <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="bottom" data-container="body" title="Unique identifier for asset"></i>
              </span>
             </div>
            </div>
          </div>
        </div>
      </div>
    </div>

 <div class="col-sm-6">
  <div class="row">
   <div class="col-sm-12 col-md-11 col-md-offset-1 col-lg-9 col-lg-offset-1">

 <div class="form-group">
 <label for="customer" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Customer</label>
  <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
   <input type="text" id="customer" name="customer" class="form-control">
    <div class="input-group-addon">
     <span class="help-inline">
      <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Vendor supplied service tag"></i>
     </span>
    </div>
   </div>
  </div>


  </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-11">
      <div class="clearfix">&nbsp;</div>
        <div class="form-group pull-right">
          <div class="btn-group">
            <button type="reset" class="btn btn-default">Reset</button>
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </div>
      </div>
    </div>
    
</form>

@endsection