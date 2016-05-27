@extends('layouts.app')

@section('content')
<div class="container">
<div class="page-header" style="position:relative;">
  <h1>Server <small>idev001</small></h1>
  <h4 class="asset-status-label">
    <span data-toggle="tooltip" title="Asset has been entered into the system - A service in this state is inactive. It does minimal work and consumes minimal resources." data-placement="bottom" class="label label-warning">New:NEW</span></h4>
</div>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#overview" data-toggle="pill">Overview</a></li>
      <li><a href="#ipmi-info" data-toggle="pill">IPMI Info</a></li>
      <li><a href="#log-data" data-toggle="pill">Logs</a></li>
      <li><a href="#hardware-details" data-toggle="pill">Hardware Details</a></li>
      <li><a href="#lldp-info" data-toggle="pill">LLDP Info</a></li>
      <li class="dropdown" data-dropdown="dropdown">
        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
         <strong>Actions</strong> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li>
            <a href="#asset-note" role="button" data-keyboard="true" data-toggle="modal" data-backdrop="static">
            <i class="glyphicon glyphicon-comment"></i> Create Note</a>
           </li>
          <li class="divider"></li>
          <li>
           <a href="#maintenance" role="button" data-keyboard="true" data-toggle="modal" data-backdrop="static"><i class="glyphicon glyphicon-wrench"></i> Maintenance Start</a>
          </li>
          <li>
           <a href="#power-server" role="button" data-keyboard="true" data-toggle="modal" data-backdrop="static">
            <i class="glyphicon glyphicon-fire"></i> Power Management</a>
          </li> 
        </ul>
      </li>
      
        <li class="disabled" data-rel="tooltip" data-original-title="This asset is not graphable"><a href="javascript:void(0);">Graphs</a></li>
     </ul>

     <!-- Tab panes -->
    <div class="tab-content">
     <div role="tabpanel" class="tab-pane active" id="overview">
      <h3>Asset Overview <small>System and user attributes</small></h3>
       <table id="basicDataTable" class="table table-hover table-condensed">
        <thead>
        <tr>
          <th></th><th></th><th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>Asset Tag</th>
            <td>idev001</td>
            <td></td>
        </tr>
        <tr>
          <th>Classification</th>
          <td><span>Unclassified</span></td>
          <td><span></span></td>          
        </tr>
        <tr>
          <th>Asset Type</th>
          <td>Server Node</td>
          <td></td>
        </tr>
        <tr class="warning">
          <td><strong>Asset Status</strong></td>
          <td>New</td>          
          <td>Asset has been entered into the system</td>
        </tr>
        <tr>
          <th>Asset State</th>
          <td>New</td>
          <td>A service in this state is inactive. It does minimal work and consumes minimal resources.</td>
        </tr>

        <tr>
          <th>Created On</th>
          <td>2016-05-27 14:23:13</td>
          <td></td>
        </tr>

        <tr>
          <th>Last Updated</th>
          <td>2016-05-27 14:23:14</td>
          <td></td>
        </tr>
        
        <tr>
          <th>Base Serial </th>
          <td>1234567890</td>
          <td>How does your computer identify itself?</td>
        </tr>
        
        <tr>
          <th>Chassis Tag </th>
          <td>Testing this</td>
          <td>Tag for asset chassis</td>
        </tr>
        
        <tr>
          <th>Total disk storage</th>
          <td>930.99 GB</td>
          <td>Total amount of available storage</td>
        </tr>
        
      </tbody>
    </table>

    <h3>Hardware Summary <small>Summary of system components reported by LSHW</small></h3>
    
    <table class="table table-hover table-condensed" id="hardwareSummary">
      <thead>
        <tr>
          <th></th><th></th><th></th>
        </tr>
      </thead>
      <tbody>
        
        <tr>
          <th colspan="3">Server Base</th>
        </tr>
        <tr>
          <td></td>
          <td>Product</td>
          <td>X8DTN</td>
        </tr>
        <tr>
          <td></td>
          <td>Vendor</td>
          <td>Supermicro</td>
        </tr>
        <tr>
        
          <th colspan="3">CPU</th>
        </tr>
        <tr>
          <td></td>
          <td>Total CPUs</td>
          <td>2</td>
        </tr>
        <tr>
          <td></td>
          <td>Total CPU Cores</td>
          <td>2</td>
        </tr>
        <tr>
          <td></td>
          <td>Total CPU Threads</td>
          <td>2</td>
        </tr>
        <tr>
          <td></td>
          <td>Hyperthreading Enabled</td>
          <td>No</td>
        </tr>
  
        <tr>
          <th colspan="3">Memory</th>
        </tr>
        <tr>
          <td></td>
          <td>Total Memory</td>
          <td>72.00 GB</td>
        </tr>
        <tr>
          <td></td>
          <td>Total Memory Banks</td>
          <td>18</td>
        </tr>
        <tr>
          <td></td>
          <td>Used Memory Banks</td>
          <td>18</td>
        </tr>
        <tr>
          <td></td>
          <td>Unused Memory Banks</td>
          <td>0</td>
        </tr>
  
        <tr>
          <th colspan="3">Disks</th>
        </tr>
        <tr>
          <td></td>
          <td>Disks</td>
          <td>3</td>
        </tr>
        <tr>
          <td></td>
          <td>SCSI Storage</td>
          <td>930.99 GB</td>
        </tr>
        <tr>
          <td></td>
          <td>Total Storage</td>
          <td>930.99 GB</td>
        </tr>
        <tr>
          <td></td>
          <td>Has PCIe Flash Disk</td>
          <td>No</td>
        </tr>
  
        <tr>
          <th colspan="3">Network</th>
        </tr>
        <tr>
          <td></td>
          <td>Interfaces</td>
          <td>4</td>
        </tr>
        <tr>
          <td></td>
          <td>Has 10Gb Interface</td>
          <td>No</td>
        </tr>
  
        <tr>
          <th colspan="3">Power</th>
        </tr>
        <tr>
          <td></td>
          <td>Units</td>
          <td>0</td>
        </tr>
        <tr>
          <td></td>
          <td>Components per Unit</td>
          <td>0</td>
        </tr>
        <tr>
          <td></td>
          <td>Total Components</td>
          <td>0</td>
        </tr>
      </tbody>
    </table>
     </div>
     <div role="tabpanel" class="tab-pane" id="ipmi-info">
      ...
     </div>
     <div role="tabpanel" class="tab-pane" id="log-data">
      ...
     </div>
     <div role="tabpanel" class="tab-pane" id="hardware-details">
      ...
      </div>
     <div role="tabpanel" class="tab-pane" id="lldp-info">
      ...
     </div>     
  </div>

   </div>
 </div>



 <div class="modal fade" id="maintenance" tabindex="-1" role="dialog" aria-labelledby="maintenanceLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="maintenanceLabel">Maintenance</h4>
      </div>
      <form action="" method="POST">
      <div class="modal-body">
<p>Asset is <em>not</em> currently in maintenance mode. Putting an asset in maintenance mode will:</p>
    <ul>
      <li>Change the asset status</li>
      <li>Cause it to be pulled from relavent configurations</li>
      <li>Stop getting production traffic</li>
    </ul>
    <p>If that all sounds good select a maintenance type, provide a description, and then click the appropriate button</p>
    <input type="hidden" name="status" value="Maintenance">

<div class="form-group">
<label for="state" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">State</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
   <select name="state" class="form-control" id="state">
     <option value="" selected="selected"></option>
     <option value="HARDWARE_PROBLEM" >Hardware Problem</option>
     <option value="HW_TESTING" >Hardware Testing</option>
     <option value="HARDWARE_UPGRADE" >Hardware Upgrade</option>
     <option value="IPMI_PROBLEM" >IPMI Problem</option>
     <option value="MAINT_NOOP" >Maintenance NOOP</option>
     <option value="NETWORK_PROBLEM" >Network Problem</option>
    <option value="RELOCATION" >Relocation</option>
          </select>
 <div class="input-group-addon">
  <span class="help-inline">
    
    <a tabindex="-1" target="_blank" href="/help?t=default#assetState">
      <i class="glyphicon glyphicon-question-sign" data-rel="tooltip" title="A state representing the operational state of the asset (i.e. network problem, hardware problem, IPMI problem, NOOP, etc)"></i>
    </a>
    
  </span>
</div>
</div>
</div>


      <div class="form-group">
        <textarea name="description" id="maintenanceDescription" class="form-control" rows="3" placeholder="Description"></textarea>
      </div>
      <div id="maintenanceError" data-purge="true" class="alert alert-block alert-danger hide-loprio hideAfterClose"></div>
    </div>
    <div class="modal-footer">
      <div class="btn-group">
       <button type="submit" class="btn btn-danger">Asset in Maintenance Mode</button>
      </div>
    </div>
   </form>

    </div>
  </div>
</div>

</div>
 @endsection