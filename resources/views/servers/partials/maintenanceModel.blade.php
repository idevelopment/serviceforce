<div class="modal fade" id="maintenance" tabindex="-1" role="dialog" aria-labelledby="maintenanceLabel">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <form action="" method="POST">
     <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
       <h4 class="modal-title" id="maintenanceLabel">{{ trans('maintenance.title') }}</h4>
     </div>
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
<label for="state" class="control-label col-lg-4 col-md-4 col-sm-4 col-xs-4">{{ trans('maintenance.state') }}</label>
<div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-8">
  <select name="state" class="form-control" id="state">
    <option value="" selected="selected"></option>
    <option value="HARDWARE_PROBLEM">{{ trans("status.HARDWARE_PROBLEM") }}</option>
    <option value="HW_TESTING" >{{ trans("status.HARDWARE_TESTING") }}</option>
    <option value="HARDWARE_UPGRADE" >{{ trans("status.HARDWARE_UPGRADE") }}</option>
    <option value="NETWORK_PROBLEM" >{{ trans("status.NETWORK_PROBLEM") }}</option>
    <option value="RELOCATION" >{{ trans("status.RELOCATION") }}</option>
   </select>

</div>
</div>

  <div class="form-group">
  <label for="state" class="control-label col-lg-4 col-md-4 col-sm-4 col-xs-4">{{ trans('maintenance.description') }}</label>
   <div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-8">
   <textarea name="maintenanDescription" id="maintenanceDescription" rows="3" class="form-control"></textarea>
   </div>
   </div>
  </div>

   <div class="modal-footer">
     <div class="btn-group">
      <button type="submit" class="btn btn-sm btn-success">{{ trans('maintenance.start') }}</button>
     </div>
   </div>

 </form>
   </div>
  </div>

 </div>
</div>
