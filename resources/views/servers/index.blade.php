@extends('layouts.app')

@section('content')
<div class="container">

<form action="{{ url('servers/lookup') }}" method="GET" class="form-horizontal">
 <div class="page-header">
      <h1>Search servers <small>Query your assets by attribute.</small></h1>
    </div>
    <input type="hidden" name="operation" value="and">
    <div class="row">
      <div class="col-sm-6">
        <div class="row">
          <div class="col-sm-12 col-md-11 col-lg-9 col-lg-offset-1">
           <div class="form-group">
 <label for="tag" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Asset Tag</label>
  <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
   <input type="text" class="focus form-control" placeholder="Asset Tag" id="tag" name="tag">
    <div class="input-group-addon">
     <span class="help-inline">
      <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Unique identifier for asset"></i>
     </span>
    </div>
  </div>
</div>

<div class="form-group">
 <label for="status" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Status</label>
  <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
   <select name="status" id="status" class="form-control">
    <option value="" selected="selected"></option>
    <option value="Allocated">Allocated</option>
    <option value="Cancelled">Cancelled</option>
    <option value="Decommissioned">Decommissioned</option>
    <option value="Incomplete">Incomplete</option>
    <option value="Maintenance">Maintenance</option>
    <option value="New">New</option>
    <option value="Provisioned">Provisioned</option>
    <option value="Provisioning">Provisioning</option>
    <option value="Unallocated">Unallocated</option>
   </select>

<div class="input-group-addon">
  <span class="help-inline">
    <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Asset Status (New, Incomplete, etc)"></i>
  </span>
</div>
</div>
</div>

<div class="form-group">
 <label for="state" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">State</label>
  <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
              <select name="state" id="state" class="form-control">
                <option value="" selected="selected"></option>
                  <option value="FAILED">Any - Failed</option>
                  <option value="NEW">Any - New</option>
                  <option value="RUNNING">Any - Running</option>
                  <option value="STARTING">Any - Starting</option>
                  <option value="STOPPING">Any - Stopping</option>
                  <option value="TERMINATED">Any - Terminated</option>
                  <option value="HARDWARE_PROBLEM">Maintenance - Hardware Problem</option>
                  <option value="HW_TESTING">Maintenance - Hardware Testing</option>
                  <option value="HARDWARE_UPGRADE">Maintenance - Hardware Upgrade</option>
                  <option value="IPMI_PROBLEM">Maintenance - IPMI Problem</option>
                  <option value="MAINT_NOOP">Maintenance - Maintenance NOOP</option>
                  <option value="NETWORK_PROBLEM">Maintenance - Network Problem</option>
                  <option value="RELOCATION">Maintenance - Relocation</option>
              </select>

<div class="input-group-addon">
  <span class="help-inline">
      <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Asset state represents the current operational state of an asset (i.e. new, failed, starting, running)"></i>    
  </span>
</div>
</div>
</div>


<div class="form-group">
<label for="type" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Type</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
              <select name="type" id="type" class="form-control">
                <option value="" selected="selected"></option>
                  <option value="SERVER_DEDICATED">Dedicated server</option>
                  <option value="SERVER_VPS">Virtual server</option>
              </select>

<div class="input-group-addon">
  <span class="help-inline">
    <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Type of Asset (Dedicated, Virtual server)"></i>
   </span>
</div>
            
</div>
</div>
          
<div class="form-group">
<label for="IP_ADDRESS" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">IP Address</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
 <input type="text" id="IP_ADDRESS" name="IP_ADDRESS" placeholder="IP Address" class="form-control">
  <div class="input-group-addon">
   <span class="help-inline">
    <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="bottom"  data-container="body" title="IP address of the asset. Prefix searches are also supported."></i>
  </span>
</div>
</div>
</div>

<div class="form-group">
 <label for="IPMI_ADDRESS" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">IPMI Address</label>
 <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
  <input type="text" id="IPMI_ADDRESS" name="IPMI_ADDRESS" placeholder="IPMI Address" class="form-control">
</div>
</div>

<div class="form-group">
 <label  class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Created Between</label>
  <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
   <div class="input-group date" data-type="date" data-date-format="yyyy-mm-dd" data-date="2011-11-01">
    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
     <input type="text" id="createdAfter" name="createdAfter" placeholder="Start" readonly class="form-control">
        </div>
              and
          <div class="input-group date" data-type="date" data-date-format="yyyy-mm-dd" data-date="2012-09-23">
           <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
           <input type="text" id="createdBefore" name="createdBefore" placeholder="End" readonly class="form-control">
              </div>
     </div>
</div>

<div class="form-group">
 <label  class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Updated Between</label>
 <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
  <div class="input-group date" data-type="date" data-date-format="yyyy-mm-dd" data-date="2011-11-01">
    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
    <input type="text" id="updatedAfter" name="updatedAfter" placeholder="Start" readonly class="form-control">
  </div>
    and
   <div class="input-group date" data-type="date" data-date-format="yyyy-mm-dd" data-date="2012-09-23">
    <span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
    <input type="text" id="updatedBefore" name="updatedBefore" placeholder="End" readonly class="form-control">
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
     <label for="HOSTNAME" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Hostname</label>
      <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
       <input type="text" id="HOSTNAME" placeholder="Hostname" class="form-control" name="HOSTNAME">
        <div class="input-group-addon">
         <span class="help-inline">
          <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Hostname of asset"></i>
         </span>
        </div>
      </div>
     </div>

<div class="form-group">
 <label for="NODECLASS" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Nodeclass</label>
  <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
   <select name="NODECLASS" id="NODECLASS" class="form-control">
    <option value="" selected="selected"></option>
    <option value="(none)">(None)</option>
   </select>

<div class="input-group-addon">
  <span class="help-inline">
    <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Nodeclass of asset"></i>
  </span>
</div>
</div>
            
</div>

<div class="form-group">
 <label for="POOL" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Pool</label>
  <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
   <select name="POOL" id="POOL" class="form-control">
    <option value="" selected="selected"></option>
    <option value="(none)">(None)</option>
   </select>
 
 <div class="input-group-addon">
  <span class="help-inline">
    <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Groups related assets spanning multiple functional roles"></i>
  </span>
</div>
             
</div>
</div>
            

<div class="form-group">
 <label for="PRIMARY_ROLE" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Primary Role</label>
  <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
   <select name="PRIMARY_ROLE" id="PRIMARY_ROLE" class="form-control">
    <option value="" selected="selected"></option>
    <option value="(none)">(None)</option>
  </select>


<div class="input-group-addon">
  <span class="help-inline">
    <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Primary functional role of asset"></i>
  </span>
</div>
              
</div>
</div>

<div class="form-group">
 <label for="SERVICE_TAG" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Service Tag</label>
  <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
   <input type="text" id="SERVICE_TAG" placeholder="Service Tag" class="form-control" name="SERVICE_TAG">
    <div class="input-group-addon">
     <span class="help-inline">
      <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Vendor supplied service tag"></i>
     </span>
    </div>
   </div>
  </div>

<div class="form-group">
<label for="CHASSIS_TAG" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Chassis Tag</label>
 <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
  <input type="text" id="CHASSIS_TAG" placeholder="Chassis Tag" class="form-control" name="CHASSIS_TAG">
 <div class="input-group-addon">
  <span class="help-inline">
    <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Tag for asset chassis"></i>
  </span>
 </div>
</div>      
</div>
            

<div class="form-group">
<label for="RACK_POSITION" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Rack Position</label>
 <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
 <input type="text" id="RACK_POSITION" placeholder="Rack Position" class="form-control" name="RACK_POSITION"> 
  <div class="input-group-addon">
  <span class="help-inline">
    
    <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Position of asset in rack"></i>
    
  </span>
</div>             
</div>
            
</div>

<div class="form-group">
 <label for="BASE_PRODUCT" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Base Product</label>
   <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
    <input type="text" id="BASE_PRODUCT" placeholder="Base Product" class="form-control" name="BASE_PRODUCT">
     <div class="input-group-addon">
      <span class="help-inline">
       <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Formal product model designation"></i>
      </span>
     </div>
    </div>
 </div>

<div class="form-group">
 <label for="BASE_VENDOR" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Base Vendor</label>
  <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
   <select name="BASE_VENDOR" id="BASE_VENDOR" class="form-control">
    <option value="" selected="selected"></option>
    <option value="(none)">(None)</option>  
   </select>

  <div class="input-group-addon">
  <span class="help-inline">   
    <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Who made your spiffy computer?"></i>    
  </span>
 </div>
</div>

</div>

<div class="form-group">
 <label for="MAC_ADDRESS" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">MAC Address</label>
  <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
   <input type="text" id="MAC_ADDRESS" placeholder="MAC Address" class="form-control" name="MAC_ADDRESS">
    <div class="input-group-addon">
     <span class="help-inline">   
      <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="MAC Address of NIC"></i>
     </span>
    </div>
   </div>
 </div>

<div class="form-group">
 <label for="CPU_SPEED_GHZ" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">CPU Speed</label>
 <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
   <select name="CPU_SPEED_GHZ" id="CPU_SPEED_GHZ" class="form-control">
    <option value="" selected="selected"></option>
    <option value="(none)">(None)</option>
   </select>

   <div class="input-group-addon">
    <span class="help-inline">
     <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="CPU Speed in GHz"></i>
    </span>
   </div>
  </div>           
 </div>           

<div class="form-group">
 <label for="MEMORY_SIZE_TOTAL" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Memory Total</label>
 <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
  <select name="MEMORY_SIZE_TOTAL" id="MEMORY_SIZE_TOTAL" class="form-control">
   <option value="" selected="selected"></option>
   <option value="(none)">(None)</option>  
  </select>
  <div class="input-group-addon">
   <span class="help-inline">
    <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Total amount of available memory in bytes"></i>
   </span>
  </div>
  </div>
 </div>

<div class="form-group">
<label for="NIC_SPEED" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">NIC Speed</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
 <select name="NIC_SPEED" id="NIC_SPEED" class="form-control">
  <option value="" selected="selected"></option>
  <option value="(none)">(None)</option>  
</select>

<div class="input-group-addon">
  <span class="help-inline">
    <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Speed of nic, stored as bits per second"></i>
  </span>
</div>
              
</div>
</div>

<div class="form-group">
 <label for="DISK_TYPE" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Inferred disk type</label>
 <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
  <select name="DISK_TYPE" id="DISK_TYPE" class="form-control">
  <option value="" selected="selected"></option>
  <option value="(none)">(None)</option>
  <option value="^IDE">IDE</option>
  <option value="^SCSI">SCSI</option>
  <option value="^PCIe">PCIe</option>
  <option value="^CD-ROM">CD-ROM</option>
 </select>

<div class="input-group-addon">
  <span class="help-inline">    
    <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Inferred disk type: SCSI, IDE or FLASH"></i>    
  </span>
</div>

</div>          
</div>     

<div class="form-group">

<label for="DISK_STORAGE_TOTAL" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Total disk storage</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
<select name="DISK_STORAGE_TOTAL" id="DISK_STORAGE_TOTAL" class="form-control">
  <option value="" selected="selected"></option>
  <option value="(none)">(None)</option> 
</select>

<div class="input-group-addon">
  <span class="help-inline">
    <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Total amount of available storage"></i>
  </span>
</div>             
</div>

</div>
  </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="form-group">
          <div class="btn-group">
            <button type="reset" class="btn btn-default">Reset</button>
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </div>
      </div>
    </div>
    
</form>
</div>
@endsection