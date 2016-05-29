@extends('layouts.app')

@section('content')

<div class="page-header">
  <h1>Server <small>idev001</small></h1>
  <h4 class="asset-status-label">
    <span data-toggle="tooltip" title="Asset has been entered into the system - A service in this state is inactive. It does minimal work and consumes minimal resources." data-placement="bottom" class="label label-warning">New</span></h4>
</div>

<div class="row">
  <div class="col-md-12">
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
           <a href="#maintenance" role="button" data-keyboard="true" data-toggle="modal">
           <i class="glyphicon glyphicon-wrench"></i> {{ trans('servers.maintenanceStart') }}</a>
          </li>
          <li>
           <a href="#power-server" role="button" data-keyboard="true" data-toggle="modal">
            <i class="fa fa-power-off"></i> {{ trans('servers.powerManagement') }}</a>
          </li>
          <li>
           <a href="#provision-server" role="button" data-keyboard="true" data-toggle="modal">
            <i class="fa fa-play"></i> {{ trans('servers.startProvisioning') }}</a>
          </li>          
        </ul>
      </li>
      
        <li class="disabled" data-rel="tooltip" data-original-title="This asset is not graphable"><a href="javascript:void(0);">{{ trans('servers.graphs') }}</a></li>
     </ul>

     <!-- Tab panes -->
    <div class="tab-content">
     <div role="tabpanel" class="tab-pane active" id="overview">
      <h3>{{ trans('servers.overviewTitle') }}</h3>
       <table id="basicDataTable" class="table table-hover table-condensed">
        <thead>
        <tr>
          <th></th><th></th><th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>{{ trans('servers.assetTag') }}</th>
            <td>{!! $server["bareMetal"]["serverHostingPack"]["bareMetalId"] !!}</td>
            <td></td>
        </tr>
        <tr>
          <th>{{ trans('servers.customer') }}</th>
          <td><a href="#">iDevelopment</a></td>
          <td><span></span></td>          
        </tr>
        <tr>
          <th>{{ trans('servers.serverType') }}</th>
          <td>{!! $server["bareMetal"]["serverType"] !!}</td>
          <td></td>
        </tr>
        <tr class="warning">
          <td><strong>{{ trans('servers.assetStatus') }}</strong></td>
          <td>New</td>          
          <td>Asset has been entered into the system</td>
        </tr>
        <tr class="success">
          <th>{{ trans('servers.serverState') }}</th>
          <td>New</td>
          <td>A service in this state is inactive. It does minimal work and consumes minimal resources.</td>
        </tr>
        <tr class="success">
          <th>{{ trans('servers.switchportStatus') }}</th>
          <td>{!! $switch["switchPort"]["status"] !!}</td>
          <td></td>
        </tr>        
        <tr>
          <th>{{ trans('servers.chassisTag') }}</th>
          <td>{!! $server["bareMetal"]["serverName"] !!}</td>
          <td>Tag for asset chassis</td>
        </tr>
        
        <tr>
          <th>{{ trans('servers.totalDisk') }}</th>
          <td>{!! $server["bareMetal"]["server"]["hardDisks"] !!}</td>
          <td>Total amount of available storage</td>
        </tr>

        <tr>
          <th>{{ trans('servers.sla') }}</th>
          <td>{!! $server["bareMetal"]["serviceLevelAgreement"]["sla"]; !!}</td>
          <td>Service Level Agreement Response time</td>
        </tr>
        <tr>
          <th>{{ trans('servers.dateCreated') }}</th>
          <td>2016-05-27 14:23:13</td>
          <td></td>
        </tr>

        <tr>
          <th>{{ trans('servers.dateModified') }}</th>
          <td>2016-05-27 14:23:14</td>
          <td></td>
        </tr>
                      
      </tbody>
    </table>


     </div>
     <div role="tabpanel" class="tab-pane" id="network-info">
      <div class="row">
      <div class="col-md-12">
        <h3>{{ trans('servers.ipOverview') }}</h3>
       <table class="table table-bordered table-hover table-condensed">
      <thead>
        <tr>
          <th>{{ trans('servers.ip') }}</th>
          <th>{{ trans('servers.ptr') }}</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>127.0.0.1</td>
          <td>localhost</td>
        </tr>
      </tbody>
    </table>
      </div>
    </div>
    </div>

     <div role="tabpanel" class="tab-pane" id="log-data">
      ...
     </div>
     <div role="tabpanel" class="tab-pane" id="hardware-details">
      <h4>Server Base <small>Collected information about the server itself</small></h4>
    <table class="table table-bordered table-hover table-condensed">
      <thead>
        <tr>
          <th class="col-md-4 col-sm-4 col-lg-4">Field</th>
          <th>Value</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Vendor Product</td>
          <td>{!! $server["bareMetal"]["server"]["serverType"]; !!}</td>
        </tr>
        <tr>
          <td>Processor Type</td>
          <td>{!! $server["bareMetal"]["server"]["processorType"]; !!} {!! $server["bareMetal"]["server"]["processorSpeed"]; !!}</td>
        </tr>
        <tr>
          <td>Total cpu</td>
          <td>{!! $server["bareMetal"]["server"]["numberOfCpus"]; !!}</td>
        </tr>
         <tr>
          <td>Total cores</td>
          <td>{!! $server["bareMetal"]["server"]["numberOfCores"]; !!}</td>
        </tr>
      </tbody>
    </table>
     
  <h4>Memory <small>Collected Memory Information</small></h4>
    <table class="table table-bordered table-hover table-condensed">
      <thead>
        <tr>
          <th class="col-md-4 col-sm-4 col-lg-4">Field</th>
          <th>Value</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Total memory</td>
          <td>{!! $server["bareMetal"]["server"]["ram"]; !!}</td>
        </tr>
      </tbody>
</table>
  
     </div>
     <div role="tabpanel" class="tab-pane" id="software-details">
        <h3>Software details</h3>
  <table class="table table-hover table-condensed" id="lldpSummary">
    <thead>
      <tr>
        <th>Type</th>
        <th>IP</th>
        <th>Name</th>
        <th>Key</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th>Control panel</th>
        <td>127.0.0.1</td>
        <td>Plesk 12 - 100 domains (Linux)</td>
        <td>PLSK.01234567.8910</td>        
      </tr>  

                <tr>
        <th>Software as a service</th>
        <td>127.0.0.1</td>
        <td>Timecontrol - 50 users</td>
        <td>-</td>        
      </tr>
    </tbody>
  </table>
     </div>     
  </div>

   </div>
 </div>



 <div class="modal fade" id="maintenance" tabindex="-1" role="dialog" aria-labelledby="maintenanceLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="maintenanceLabel">{{ trans('maintenance.title') }}</h4>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
      <p>{{ trans('maintenance.intro') }}</p>
    <ul>
      <li>{{ trans('maintenance.option1') }}</li>
      <li>{{ trans('maintenance.option2') }}</li>
      <li>{{ trans('maintenance.option3') }}</li>
    </ul>
    <p>{{ trans('maintenance.final') }}}</p>
    <input type="hidden" name="status" value="Maintenance">

<div class="form-group">
<label for="state" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">{{ trans('maintenance.state') }}</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
   <select name="state" class="form-control" id="state">
     <option value="" selected="selected"></option>
     <option value="HARDWARE_PROBLEM" >Hardware Problem</option>
     <option value="HW_TESTING" >Hardware Testing</option>
     <option value="HARDWARE_UPGRADE" >Hardware Upgrade</option>
     <option value="NETWORK_PROBLEM" >Network Problem</option>
     <option value="RELOCATION" >Relocation</option>
    </select>

</div>
</div>

   <div class="form-group">
   <label for="state" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">{{ trans('maintenance.description') }}</label>
    <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
    <textarea name="maintenanDescription" id="maintenanceDescription" rows="3" class="form-control"></textarea>
    </div>
    </div>
   </div>

    <div class="modal-footer">
      <div class="btn-group">
       <button type="submit" class="btn btn-sm btn-success">{{ trans('maintenance.start') }}</button>
      </div>
    </div>
    </div>

   </form>

    </div>
  </div>
</div>


 <div class="modal fade" id="provision-server" tabindex="-1" role="dialog" aria-labelledby="provisionLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
         </button>
        <h4 class="modal-title" id="provisionLabel">Provision Server</h4>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
       <p>Provisioning a server is a destructive process. Be certain that you want to do this. The provisioner will:</p>
        <ul>
         <li>Verify the server is stable</li>
         <li>Power it off</li>
         <li>Reinstall the operating system</li>
         <li>Come back online without old data on disks</li>
        </ul>
    <p>If that all sounds good, choose an appropriate profile below.</p>
    <input type="hidden" name="status" value="Maintenance">

<div class="form-group">
<label for="profile" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Profile</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
   <select name="state" class="form-control" id="state">
     <option value="" selected="selected"></option>         
          <option value="adminwebnode">Admin Web Server</option>
          <option value="collinsnode">Collins Server</option>
          <option value="dhcpnode">DHCP/iPXE Server</option>
          <option value="mysqlnode">Mysql Database Server</option>
          <option value="devnode">Dev Machine</option>        
          <option value="gitlabnode">Gitlab Server</option>       
          <option value="icinganode">Icinga Server</option>         
          <option value="mailrelaynode">Mail Relay Server</option>
          <option value="servicenode">Platform Service Server</option>
          <option value="puppetnode">Puppet Master</option>
          <option value="redisnode">Redis Server</option>
          <option value="utilnode">Utility Server</option>
          <option value="varnishnode">Varnish Server</option>
          <option value="webnode">Web Server</option>
          </select>
 <div class="input-group-addon">
  <span class="help-inline">
      <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="A state representing the operational state of the asset (i.e. network problem, hardware problem, IPMI problem, NOOP, etc)"></i>
  </span>
</div>
</div>
</div>


      <div class="form-group">
        <textarea name="description" id="maintenanceDescription" class="form-control" rows="3" placeholder="Description"></textarea>
      </div>

    </div>
    <div class="modal-footer">
      <div class="btn-group">
       <button type="submit" class="btn btn-success">Provision server</button>
      </div>
    </div>
   </form>

    </div>
  </div>
</div>
 @endsection