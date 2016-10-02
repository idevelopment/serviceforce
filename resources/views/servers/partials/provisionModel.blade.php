<div class="modal fade" id="provision-server" tabindex="-1" role="dialog" aria-labelledby="provisionLabel">
 <div class="modal-dialog " role="document">
   <div class="modal-content">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
        </button>
       <h4 class="modal-title" id="provisionLabel">{{ trans('servers.ReinstallTitle') }}</h4>
     </div>
     <form action="{!! url('servers/reinstall') !!}" method="post">
       {{ csrf_field() }}
     <div class="modal-body">
      <p>{{ trans('servers.ReinstallDesc1') }}<br>
         {{ trans('servers.ReinstallDesc2') }}<br><br>
         {{ trans('servers.ReinstallDesc3') }}</p>

       <ul>
        <li>{{ trans('servers.ReinstallDesc4') }}</li>
        <li>{{ trans('servers.ReinstallDesc5') }}</li>
        <li>{{ trans('servers.ReinstallDesc6') }}</li>
        <li>{{ trans('servers.ReinstallDesc7') }}</li>
       </ul>
   <p>If that all sounds good, choose an appropriate operating system below.</p>
   <input type="hidden" name="status" value="Maintenance">
   <input type="hidden" name="serverId" value="{!! $server["bareMetalId"] !!}">


<div class="form-group">
<label for="OperatingSystem" class="control-label col-lg-4 col-md-4 col-sm-4 col-xs-4">{{ trans('servers.ReinstallOs') }} <span class="text-danger">*</span> </label>
<div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-8">
  <select name="OperatingSystem" id="OperatingSystem" class="form-control">
    <option value="" selected="selected">-- Please select --</option>
    @foreach($OperatingSystems as $osItems)
           @foreach($osItems as $item)
      <option value="{!! $item['operatingSystem']["id"] !!}">{!! $item['operatingSystem']["name"] !!}</option>
     @endforeach
   @endforeach
   </select>
<div class="input-group-addon">
 <span class="help-inline">
     <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="bottom" title="{{ trans('servers.ReinstallOShelper') }}"></i>
 </span>
</div>
</div>
</div>

   <div class="form-group">
    <label for="reinstallDescription" class="control-label col-lg-4 col-md-4 col-sm-4 col-xs-4">{{ trans('servers.ReinstallDescription') }} <span class="text-danger">*</span></label>
     <div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-8">
      <textarea name="reinstallDescription" id="reinstallDescription" class="form-control" rows="3" placeholder="{{trans('servers.ReinstallDescriptionHelper')}}"></textarea>
     </div>
   </div>

   </div>
   <div class="modal-footer">
     <div class="btn-group">
      <button type="submit" id="submitReinstall" class="btn btn-sm btn-success">{{ trans('servers.startProvisioning') }}</button>
     </div>
   </div>
  </form>
    </div>
   </div>
 </div>
