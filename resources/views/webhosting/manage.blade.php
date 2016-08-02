@extends('layouts.app')
@section('content')
@foreach($subscription as $item)
<div class="page-header">
  <h1>Manage <small>{!! $item["name"] !!}</small></h1>
  <h4 class="asset-status-label">
      @if ($item["subscription_status"] === 16)
    <span class="label label-warning">
             Suspended
      </span>
            @elseif ($item["subscription_status"] === 0)
    <span class="label label-success">           
             Provisionised
             </span>
            @else 
    <span class="label label-warning">           

    </span>
            @endif
    </h4>
</div>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#overview" data-toggle="tab">{{ trans('webhosting.overview') }}</a></li>
      <li><a href="#log-data" data-toggle="tab">{{ trans('webhosting.databases') }}</a></li>      
      <li><a href="#mail-data" data-toggle="tab">{{ trans('webhosting.mail') }}</a></li>    
      <li><a href="#log-data" data-toggle="tab">{{ trans('webhosting.logs') }}</a></li>
      <li><a href="#software-details" data-toggle="tab">{{ trans('webhosting.software') }}</a></li>
      <li class="dropdown" data-dropdown="dropdown">
        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
         <strong>{{ trans('servers.actions') }}</strong> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li>
            <a href="#asset-note" role="button" data-keyboard="true" data-toggle="modal">
            <i class="glyphicon glyphicon-comment"></i> {{ trans('servers.createNote') }}</a>
           </li>
          <li class="divider"></li>
          <li>
           <a href="#maintenance" role="button"  data-backdrop="static" data-keyboard="true" data-toggle="modal">
           <i class="glyphicon glyphicon-wrench"></i> {{ trans('servers.maintenance') }}</a>
          </li>
          <li>
           <a href="#power-server" role="button"  data-backdrop="static" data-keyboard="true" data-toggle="modal">
            <i class="fa fa-power-off"></i> {{ trans('servers.powerManagement') }}</a>
          </li>
          <li>
           <a href="#provision-server" role="button" data-backdrop="static" data-keyboard="true" data-toggle="modal">
            <i class="fa  fa-recycle"></i> {{ trans('servers.startReinstall') }}</a>
          </li>          
        </ul>
      </li>
      
        <li>
         <a href="#datatraffic-info">{{ trans('servers.graphs') }}</a>
        </li>
     </ul>

     <!-- Tab panes -->
    <div class="tab-content">
     <div role="tabpanel" class="tab-pane active" id="overview">
      <h3>{{ trans('servers.overviewTitle') }}</h3>
       <table class="table table-hover table-condensed">
        <thead>
        <tr>
          <th></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>{{ trans('webhosting.customer') }}</th>
          <td><a href="#">iDevelopment</a></td>
          <td><span></span></td>          
        </tr>
        <tr>
          <th>{{ trans('webhosting.plan') }}</th>
          <td><a href="#">Medium</a></td>
          <td><span></span></td>          
        </tr>

        <tr>
          <th>{{ trans('webhosting.domain') }}</th>
          <td>{!! $item["name"] !!}</td>
          <td><span></span></td>          
        </tr>

        <tr>
          <th>{{ trans('webhosting.ip') }}</th>
          <td>{!! $item["dns_ip_address"] !!}</td>
          <td><span></span></td>          
        </tr>

        <tr>
          <th>{{ trans('webhosting.directory') }}</th>
          <td>{!! $item["hosting"]["vrt_hst"]["www_root"] !!}</td>
          <td><span></span></td>          
        </tr>        
     
        <tr class="success">
          <td><strong>{{ trans('webhosting.status') }}</strong></td>
          <td>{!! $item["status"] !!}</td>          
          <td></td>
        </tr>        
      </tbody>
    </table>
    </div>
    <div role="tabpanel" class="tab-pane" id="mail-data">
    <h3>Mailboxes</h3>
       <table class="table table-striped table-condensed">
    <thead>
      <tr>
       <th>Mailbox</th>
       <th>Quota</th>
      </tr>
    </thead>
    <tbody>
    @foreach($Mailbox as $mail_item)
      <tr>
        <td><a href="{!! $mail_item['username'] !!} @ {!! $item['name'] !!} ">{!! $mail_item['username'] !!} @ {{ $item['name'] }}</td>
        <td></td>
      </tr>
      @endforeach
    </tbody> 
    </table>
    </div>

   </div>
  </div>
 </div>
<pre>
  <?php print_r($item); ?>
</pre>

 @endforeach
@endsection
