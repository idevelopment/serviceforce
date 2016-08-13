@extends('layouts.app')

@section('content')
<div class="page-header">
  <h1>Manage server: <small>{!! $server["bareMetalId"] !!}</small></h1>
  <h4>
    @if ($server["serverStatus"] === "Provisioning")
      <span class="label label-warning">{!! $server["serverStatus"] !!}</span>
       @elseif ($server["serverStatus"] === "Provisioned")
       <span class="label label-success">{!! $server["serverStatus"] !!}</span>
     @elseif ($server["serverStatus"] === "Maintenance")
       <span class="label label-info">{!! $server["serverStatus"] !!}</span>
       @else
       <span class="label label">{!! $server["serverStatus"] !!}</span>
       @endif
  </h4>
</div>

<div class="row">
  <div class="col-md-12">
    @if(Session('success'))

    <div class="alert alert-success alert-dismissible fade in">
      <h4>Operation completed</h4>
      {{ Session('success')}}
    </div>
    @endif

    @if(Session('error'))
    <div class="alert alert-danger alert-dismissible fade in">
      <button class="close" aria-label="Close" data-dismiss="alert" type="button">
        <span aria-hidden="true">×</span>
      </button>
      <h4>An error has occurred</h4>
      <p>{{ Session('error')}}</p>
    </div>
    @endif

    <div class="bordered-tab-contents">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#overview" data-toggle="tab">{{ trans('servers.overview') }}</a></li>
      <li><a href="#network-info" data-toggle="tab">{{ trans('servers.network') }}</a></li>
      <li><a href="#log-data" data-toggle="tab">{{ trans('servers.logs') }}</a></li>
      <li><a href="#hardware-details" data-toggle="tab">{{ trans('servers.hardware') }}</a></li>
      <li><a href="#software-details" data-toggle="tab">{{ trans('servers.software') }}</a></li>
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
           <i class="fa fa-wrench"></i> {{ trans('servers.maintenance') }}</a>
          </li>
          <li>
           <a href="#power-server" role="button"  data-backdrop="static" data-keyboard="true" data-toggle="modal">
            <i class="fa fa-power-off"></i> {{ trans('servers.powerManagement') }}</a>
          </li>
          <li>
           <a href="#provision-server" role="button" data-backdrop="static" data-keyboard="true" data-toggle="modal">
            <i class="fa fa-play"></i> {{ trans('servers.startReinstall') }}</a>
          </li>
          <li class="divider"></li>
          <li>
           <a href="{{url('servers/remove')}}/{!! $server["bareMetalId"] !!}" role="button" data-backdrop="static" data-keyboard="true" data-toggle="modal">
            <i class="fa fa-trash"></i> {{ trans('servers.cancel') }}</a>
          </li>
        </ul>
      </li>

        <li>
         <a href="#datatraffic" data-toggle="tab">{{ trans('servers.graphs') }}</a>
        </li>
     </ul>

     <!-- Tab panes -->
    <div class="tab-content">
     <div role="tabpanel" class="tab-pane active" id="overview">
      @include('servers/partials/basicData')
     </div>
     <div role="tabpanel" class="tab-pane" id="network-info">
       @include('servers/partials/networkData')
    </div>
     <div role="tabpanel" class="tab-pane" id="log-data">
       @include('servers/partials/logData')
     </div>
     <div role="tabpanel" class="tab-pane" id="hardware-details">
       @include('servers/partials/hwData')
     </div>
     <div role="tabpanel" class="tab-pane" id="software-details">
       @include('servers/partials/softwareData')
     </div>
     <div role="tabpanel" class="tab-pane" id="datatraffic">
       @include('servers/partials/graphData')
     </div>
   </div>
   </div>
 </div>

 @include('servers/partials/maintenanceModel')
 @include('servers/partials/provisionModel')
</div>

<script type="text/javascript">
$(document).ready(function() {
// When User Fills Out Form Completely
$("#submitReinstall").attr('disabled', 'disabled');
$("#submitReinstall").removeClass('btn-success');
$("#submitReinstall").addClass("btn-danger");

$("form").keyup(function() {
// To Disable Submit Button
$("#submitReinstall").attr('disabled', 'disabled');
$("#submitReinstall").removeClass('btn-success');
$("#submitReinstall").addClass("btn-danger");
// Validating Fields
var OperatingSystem = $("#OperatingSystem").val();
var reinstallDescription = $("#reinstallDescription").val();
if (!(OperatingSystem == "" || reinstallDescription == "")) {
// To Enable Submit Button
$("#submitReinstall").removeAttr('disabled');
$("#submitReinstall").removeClass('btn-danger');
$("#submitReinstall").addClass("btn-success");
}
});
// On Click Of Submit Button
$("#submitReinstall").click(function() {
$("#submitReinstall").css({
"cursor": "default",
"box-shadow": "none"
});

 alert("Requesting Reinstallation");

 });
});
</script>

<script type="text/javascript">
$(function () {
    $('#traffic').highcharts({
        data: {
            table: 'output'
        },
        chart: {
            type: 'line'
        },
        title: {
            text: 'Monthly network usage'
        },
        yAxis: {
            allowDecimals: false,
            title: {
                text: 'Total'
            }
        },
        tooltip: {
           enabled: true,
            formatter: function () {
                return '<b>' + this.series.name + '</b><br/>' +
                    this.point.y
            }
        }
    });
});
</script>
 @endsection
