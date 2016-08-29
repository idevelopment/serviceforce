@extends('layouts.app')
@section('content')
<div class="page-header">
  <h2>Webhosting assets</h2>
</div>
<div class="clearfix">&nbsp;</div>

<ul class="nav nav-tabs" role="tablist">
  <li role="presentation" class="@if(Request::is('webhosting')) active @endif"><a href="#search" aria-controls="search" role="tab" data-toggle="tab">Search subscription</a></li>
  <li role="presentation" class=""><a href="#list" aria-controls="list" role="tab" data-toggle="tab">List all subscriptions</a></li>
  <li role="presentation" class="@if(Request::is('webhosting/register')) active @else  @endif"><a href="#create" aria-controls="create" role="tab" data-toggle="tab"><i class="fa fa-plus"></i> Create new subscription</a></li>

</ul>

<div class="tab-content">
  <div role="tabpanel" class="tab-pane @if(Request::is('webhosting')) active @else  @endif" id="search">
   <form action="{{ url('webhosting/lookup') }}" method="post" class="form-horizontal">
    <input type="hidden" name="operation" value="and">
    <div class="row">
      <div class="col-sm-6">
        <div class="row">
          <div class="col-sm-12 col-md-11 col-lg-9 col-lg-offset-1">
           <div class="form-group">
            <label for="name" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Domain name</label>
             <div class="input-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
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
  <div class="input-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
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
</div>

<div role="tabpanel" class="tab-pane" id="list">
  <table id="subscriptions" class="table table-hovered">
  	 <thead>
          <tr>
            <th>Domain name</th>
            <th>Customer</th>
            <th>Status</th>
            <th>Date Created</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        @foreach($subscriptions as $item)
         @if ($item["subscription_status"] === 16)
          <tr class="warning">
         @else
          <tr class="">
        @endif
           <td><a href="{{ url('webhosting/manage')}}/{!! $item["id"] !!}">{!! $item["name"] !!}</a></td>
           <td><a href="#">{!! $item["owner_id"] !!}</a></td>
           <td>
              @if ($item["subscription_status"] === 16)
               Suspended
              @elseif ($item["subscription_status"] === 0)
               Provisionised
              @else

              @endif
              </td>
          <td>{!! $item["created"] !!}</td>
          <td><a href="{{ url('webhosting/manage')}}/{!! $item["id"] !!}" data-toggle="tooltip" title="Account details" data-placement="bottom"><i class="fa fa-info-circle"></i></a></td>
        	</tr>
          @endforeach
        </tbody>
  </table>


  <script type="text/javascript">
    $(document).ready(function() {
      $('#subscriptions').DataTable();
  } );
  </script>


</div>

<div role="tabpanel" class="tab-pane @if(Request::is('webhosting/register')) active @else  @endif" id="create">
  <form action="{{ route('webhosting.save') }}" method="post" class="form-horizontal">
    {{ csrf_field() }}
    <div class="form-group">
    <label for="domain" class="col-sm-2 control-label">Domain name <span class="text-danger">*</span></label>
    <div class="col-sm-6">
      <input type="text" id="domain" name="domain" class="form-control">
    </div>
  </div>

  <div class="form-group">
    <label for="ip" class="col-sm-2 control-label">IP address <span class="text-danger">*</span></label>
    <div class="col-sm-6">
      <select name="ip" id="ip" class="form-control">
        <option value="" selected="">-- Please select --</option>
        @foreach($ipList as $ip)
         <option value="">{!! $ip["ip_address"] !!} - {!! $ip["type"] !!}</option>
        @endforeach
      </select>
    </div>
  </div>

  <div class="form-group">
    <label for="plesk_username" class="col-sm-2 control-label">Username <span class="text-danger">*</span></label>
    <div class="col-sm-6">
      <input type="text" id="plesk_username" name="plesk_username" class="form-control">
    </div>
  </div>

  <div class="form-group">
    <label for="password" class="col-sm-2 control-label">Password <span class="text-danger">*</span></label>
    <div class="col-sm-6">
      <input type="password" id="password" name="password" class="form-control">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Save</button>
      <button type="reset" class="btn btn-danger">Reset</button>

    </div>
  </div>

  </form>
</div>
</div>
@endsection
