<form action="{{ url('servers/lookup') }}" method="GET" class="form-horizontal">
<div class="row">
  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-12 col-md-11 col-lg-9 col-lg-offset-1">
       <div class="form-group">
<label for="tag" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">{{trans('servers.assetTag')}}</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
<input type="text" class="focus form-control" id="tag" name="tag">
<div class="input-group-addon">
 <span class="help-inline">
  <i class="fa fa-info-circle" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Unique identifier for asset"></i>
 </span>
</div>
</div>
</div>

<div class="form-group">
<label for="IP_ADDRESS" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">{{trans('servers.ip')}}</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
<input type="text" id="IP_ADDRESS" name="IP_ADDRESS" class="form-control">
<div class="input-group-addon">
<span class="help-inline">
<i class="fa fa-info-circle" data-toggle="tooltip" data-placement="bottom"  data-container="body" title="IP address of the asset. Prefix searches are also supported."></i>
</span>
</div>
</div>
</div>

<div class="form-group">
 <label for="hostname" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">{{trans('servers.hostname')}}</label>
  <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
   <input type="text" id="hostname" class="form-control" name="hostname">
    <div class="input-group-addon">
     <span class="help-inline">
      <i class="fa fa-info-circle" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Hostname of the server"></i>
     </span>
    </div>
  </div>
 </div>

 <div class="form-group">
 <label for="state" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">{{trans('servers.serverState')}}</label>
 <div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
           <select name="state" id="state" class="form-control">
            <option value="" selected=""></option>
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
   <i class="fa fa-info-circle" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Asset state represents the current operational state of an asset (i.e. new, failed, starting, running)"></i>
 </span>
 </div>
 </div>
 </div>

<div class="form-group">
<label for="status" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">{{trans('servers.assetStatus')}}</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
<select name="status" id="status" class="form-control">
<option value="" selected="selected"></option>
@foreach($states as $state_item)
<option value="{!! $state_item['State_label'] !!}">{{ $state_item["State_Name"] }}</option>
@endforeach
</select>

<div class="input-group-addon">
<span class="help-inline">
<i class="fa fa-info-circle" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Asset Status (New, Incomplete, etc)"></i>
</span>
</div>
</div>
</div>


<div class="form-group">
<label for="type" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">{{trans('servers.serverType')}}</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
          <select name="type" id="type" class="form-control">
            <option value="" selected="selected"></option>
              <option value="SERVER_DEDICATED">Bare metal</option>
              <option value="SERVER_VPS">Virtual server</option>
          </select>

<div class="input-group-addon">
<span class="help-inline">
<i class="fa fa-info-circle" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Type of Asset (Dedicated, Virtual server)"></i>
</span>
</div>

</div>
</div>

<div class="form-group">
<label for="startDate"  class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Created Between</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
 <input type="text" id="startDate" name="startDate" placeholder="Start" class="form-control">
    </div>
          and
      <div class="input-group">
       <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
       <input type="text" id="endDate" name="endDate" placeholder="End" class="form-control">
          </div>
 </div>
</div>

</div>
</div>
</div>

<div class="col-sm-6">
<div class="row">
<div class="col-sm-12 col-md-11 col-md-offset-1 col-lg-10">


<div class="form-group">
<label for="NODECLASS" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Nodeclass</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
<select name="NODECLASS" id="NODECLASS" class="form-control">
<option value="" selected="selected"></option>
<option value="(none)">(None)</option>
</select>

<div class="input-group-addon">
<span class="help-inline">
<i class="fa fa-info-circle" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Nodeclass of asset"></i>
</span>
</div>
</div>

</div>

<div class="form-group">
<label for="OperatingSystem" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Operating system</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
<select name="OperatingSystem" id="OperatingSystem" class="form-control">
<option value="" selected="selected"></option>
@foreach($osList as $osItems)
       @foreach($osItems as $item)
  <option value="{!! $item['operatingSystem']["id"] !!}">{!! $item['operatingSystem']["name"] !!}</option>
 @endforeach
@endforeach
</select>


<div class="input-group-addon">
<span class="help-inline">
<i class="fa fa-info-circle" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Primary functional role of asset"></i>
</span>
</div>

</div>
</div>

<div class="form-group">
<label for="SERVICE_TAG" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">{{ trans('servers.chassisTag') }}</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
<input type="text" id="SERVICE_TAG" class="form-control" name="SERVICE_TAG">
<div class="input-group-addon">
 <span class="help-inline">
  <i class="fa fa-info-circle" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Vendor supplied service tag"></i>
 </span>
</div>
</div>
</div>

<div class="form-group">
<label for="CHASSIS_TAG" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">{{ trans('servers.site') }}</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
<input type="text" id="site" name="site" class="form-control">
<div class="input-group-addon">
<span class="help-inline">
<i class="fa fa-info-circle" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Tag for asset chassis"></i>
</span>
</div>
</div>
</div>


<div class="form-group">
<label for="cabinet" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">{{ trans('servers.cabinet') }}</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
<input type="text" id="cabinet" name="cabinet" class="form-control">
<div class="input-group-addon">
<span class="help-inline">

<i class="fa fa-info-circle" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Position of asset in rack"></i>

</span>
</div>
</div>

</div>

<div class="form-group">
<label for="BASE_PRODUCT" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Base Product</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
<input type="text" id="BASE_PRODUCT" class="form-control" name="BASE_PRODUCT">
 <div class="input-group-addon">
  <span class="help-inline">
   <i class="fa fa-info-circle" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Formal product model designation"></i>
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
<i class="fa fa-info-circle" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Who made your spiffy computer?"></i>
</span>
</div>
</div>

</div>

<div class="form-group">
<label for="MAC_ADDRESS" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">MAC Address</label>
<div class="input-group col-lg-9 col-md-9 col-sm-9 col-xs-9">
<input type="text" id="MAC_ADDRESS"  class="form-control" name="MAC_ADDRESS">
<div class="input-group-addon">
 <span class="help-inline">
  <i class="fa fa-info-circle" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="MAC Address of NIC"></i>
 </span>
</div>
</div>
</div>

</div>
    </div>
  </div>


</div>

<div class="row">
  <div class="col-sm-6">
    <div class="row">
      <div class="col-sm-12 col-md-11 col-lg-9 col-lg-offset-1">
        <div class="form-group">
      <div class="col-lg-10 col-md-0 col-sm-10 col-xs-10">
    <button type="submit" class="btn btn-primary">Search</button>
    <button type="reset" class="btn btn-danger">Reset</button>
  </div>
</div>
</div>
</div>
</div>
</div>

</form>

<script type="text/javascript">
          $(document).ready(function() {
               $('#startDate').datetimepicker({
            useCurrent: true,
            format:'YYYY-MM-DD',
        });
               $('#endDate').datetimepicker({
            useCurrent: false,
            format:'YYYY-MM-DD',
        });
        $("#startDate").on("dp.change", function (e) {
            $('#endDate').data("DateTimePicker").minDate(e.date);
        });
        $("#endDate").on("dp.change", function (e) {
            $('#startDate').data("DateTimePicker").maxDate(e.date);
        });
    });
       </script>
