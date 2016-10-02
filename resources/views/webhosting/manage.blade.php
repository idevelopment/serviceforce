@extends('layouts.app')
@section('content')
@foreach($item as $web)
<div class="page-header">
  <h1>Manage <small>{!! $web["name"] !!}</small></h1>
  <h4 class="asset-status-label">
      @if ($web["subscription_status"] === 16)
    <span class="label label-warning">
             Suspended
      </span>
            @elseif ($web["subscription_status"] === 0)
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
      <li><a href="#dns-data" data-toggle="tab">{{ trans('webhosting.dns') }}</a></li>
      <li><a href="#databases" data-toggle="tab">{{ trans('webhosting.databases') }}</a></li>
      <li><a href="#mail-data" data-toggle="tab">{{ trans('webhosting.mail') }}</a></li>
      <li><a href="#log-data" data-toggle="tab">{{ trans('webhosting.logs') }}</a></li>
      <li><a href="#subdomains" data-toggle="tab">{{ trans('webhosting.subdomains') }}</a></li>

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
           <a href="#provision-server" role="button" data-backdrop="static" data-keyboard="true" data-toggle="modal">
            <i class="fa  fa-recycle"></i> {{ trans('webhosting.cancel') }}</a>
          </li>
        </ul>
      </li>

        <li>
         <a href="http://{!! $web["name"] !!}/plesk-stat/webstat" target="_blank">{{ trans('servers.graphs') }}</a>
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
          <th class="col-md-3">{{ trans('webhosting.customer') }}</th>
          <td><a href="#">iDevelopment</a></td>
          <td><span></span></td>
        </tr>
        <tr>
          <th  class="col-md-3">{{ trans('webhosting.plan') }}</th>
          <td><a href="#">{!! $web["subscriptions"]["0"]["plan-guid"] !!}</a></td>
          <td><span></span></td>
        </tr>

        <tr>
          <th  class="col-md-3">{{ trans('webhosting.domain') }}</th>
          <td>{!! $web["name"] !!}</td>
          <td><span></span></td>
        </tr>

        <tr>
          <th  class="col-md-3">{{ trans('webhosting.ip') }}</th>
          <td>{!! $web["dns_ip_address"] !!}</td>
          <td><span></span></td>
        </tr>

        <tr class="success">
          <td  class="col-md-3"><strong>{{ trans('webhosting.status') }}</strong></td>
          <td>{!! $web["status"] !!}</td>
          <td></td>
        </tr>
      </tbody>
    </table>

    <h3>Access details</h3>
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
        <th class="col-md-3">{{ trans('webhosting.ssl') }}</th>
        <td><a href="#">{!! $web["hosting"]["vrt_hst"]["ssl"] !!}</a></td>
        <td><span></span></td>
      </tr>

      <tr>
        <th class="col-md-3">{{ trans('webhosting.certificateName') }}</th>
        <td>
          @if(!empty($web["hosting"]["vrt_hst"]["certificate_name"]))
          {!! $web["hosting"]["vrt_hst"]["certificate_name"] !!}
          @else
          No SSL certificate configured
          @endif
        </td>
        <td><span>This is the assigned certificate for this domain </span></td>
      </tr>

      <tr>
        <th class="col-md-3">{{ trans('webhosting.cgi') }}</th>
        <td>{!! $web["hosting"]["vrt_hst"]["cgi"] !!}</td>
        <td><span></span></td>
      </tr>

      <tr>
        <th class="col-md-3">{{ trans('webhosting.perl') }}</th>
        <td>{!! $web["hosting"]["vrt_hst"]["perl"] !!}</td>
        <td><span></span></td>
      </tr>

      <tr>
        <th class="col-md-3">{{ trans('webhosting.php') }}</th>
        <td>{!! $web["hosting"]["vrt_hst"]["php"] !!}</td>
        <td><span></span></td>
      </tr>

      <tr>
        <th class="col-md-3">{{ trans('webhosting.phpHandlerType') }}</th>
        <td>{!! $web["hosting"]["vrt_hst"]["php_handler_type"] !!}</td>
        <td><span></span></td>
      </tr>

      <tr>
        <th class="col-md-3">{{ trans('webhosting.python') }}</th>
        <td>{!! $web["hosting"]["vrt_hst"]["python"] !!}</td>
        <td><span></span></td>
      </tr>

      <tr>
        <th class="col-md-3">{{ trans('webhosting.webstat') }}</th>
        <td>{!! $web["hosting"]["vrt_hst"]["webstat"] !!}</td>
        <td><span></span></td>
      </tr>

      <tr>
        <th class="col-md-3">{{ trans('webhosting.directory') }}</th>
        <td>{!! $web["hosting"]["vrt_hst"]["www_root"] !!}</td>
        <td><span></span></td>
      </tr>

    </tbody>
  </table>
    </div>

    <div role="tabpanel" class="tab-pane" id="dns-data">
     <h3>{{ trans('webhosting.dns') }}</h3>
      <table class="table table-hover table-condensed">
       <thead>
       <tr>
         <th class="col-md-4">Hostname</th>
         <th class="col-md-2">Type</th>
         <th class="col-md-4">Value</th>
         <th class="text-center">Status</th>
       </tr>
     </thead>
     <tbody>
       @foreach($dns as $record)
       <tr>
         <td>{!! $record["host"] !!}</td>
         <td>{!! $record["type"] !!}</td>
         <td>{!! $record["value"] !!}</td>
         <td class="text-center">{!! $record["status"] !!}</td>
       </tr>
       @endforeach

     </tbody>
   </table>
 </div>

    <div role="tabpanel" class="tab-pane" id="mail-data">
    <h3>Mailboxes</h3>
       <table class="table table-striped table-condensed">
    <thead>
      <tr>
       <th>Mailbox</th>
      </tr>
    </thead>
    <tbody>
      @if(!empty($mail))
      @foreach($mail as $mail_item)
        <tr>
          <td><a href="">{!! $mail_item['username']!!}</td>
          <td></td>
        </tr>
        @endforeach
      @else
      <td>No mailbox has been configured on this account</td>
      @endif
    </tbody>
    </table>
    </div>

   </div>
  </div>
 </div>
@endforeach
@endsection
