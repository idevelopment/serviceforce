@extends('layouts.app')

@section('content')
<form action="{{ url('servers/create') }}" method="POST" class="form-horizontal">
 <div class="page-header">
      <h1>Provision a new server</h1>
    </div>
    @if(Session('message'))
    <div class="alert alert-success">{{ Session('message')}}</div>
    @endif

    @if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade in">
      <button class="close" aria-label="Close" data-dismiss="alert" type="button">
        <span aria-hidden="true">×</span>
      </button>
      <h4>An error has occurred</h4>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! csrf_field() !!}

    <input type="hidden" name="operation" value="and">
    <div class="row">
     <div class="col-sm-12">
       <div id="wizard" class="wizard">
      <h3>General data</h3>
      <section>
        kmjkjgfdlgj
       <div class="col-sm-6 col-md-6">
        <div class="row">
          <div class="col-sm-12 col-md-11 col-lg-9">
           <div class="form-group {{ $errors->has('serverPool') ? ' has-error' : '' }}">
            <label for="serverPool" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Pool <span class="text-danger">*</span></label>
             <div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-8">
             <select name="serverPool" id="serverPool" class="form-control">
              <option value="" selected="">-- Please select --</option>
              <option value="Production">Production</option>
              <option value="Development">Development</option>
              <option value="Customers">Customers</option>
              </select>

              <div class="input-group-addon">
               <span class="help-inline">
                <i class="fa fa-info-circle" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="What kind of server do you like to request?"></i>
              </span>
             </div>
            </div>
          </div>

        <div style="display:none;" id="customer">
           <div class="form-group">
           <label for="customerID" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Customer <span class="text-danger">*</span></label>
           <div class="input-group col-lg-8 col-md-8 col-sm-9 col-xs-8">
           <input type="text" name="customerID" id="customerID" placeholder="Fill in the customer id" class="form-control">
              <div class="input-group-addon">
               <span class="help-inline">
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="bottom"  data-container="body" title="Customer number"></i>
              </span>
             </div>
            </div>
          </div>
        </div>

        <div style="display:none;" id="localID">
          <div class="form-group">
           <label for="type" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Employee <span class="text-danger">*</span></label>
           <div class="input-group col-lg-8 col-md-8 col-sm-9 col-xs-8">
           <select name="user" class="form-control">
             @foreach($users as $user)
            <option value="{!! $user->id !!}">{!! $user->fname !!} {!! $user->name !!}</option>
            @endforeach
           </select>
              <div class="input-group-addon">
               <span class="help-inline">
                <i class="fa fa-info-circle" data-toggle="tooltip" data-placement="bottom"  data-container="body" title="What kind of server do you like to request?"></i>
              </span>
             </div>
            </div>
          </div>
        </div>

           <div class="form-group">
           <label for="type" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Server Type <span class="text-danger">*</span></label>
           <div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-8">
             <select name="type" id="type" class="form-control" disabled="">
              <option value="" selected="selected"></option>
              <option value="Bare Metal">Bare metal</option>
              <option value="Virtual server">Virtual server</option>
              <option value="pay-as-you-go" selected="selected">Pay as you go</option>
              </select>

              <div class="input-group-addon">
               <span class="help-inline">
                <i class="fa fa-info-circle" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="What kind of server do you like to request?"></i>
              </span>
             </div>
            </div>
          </div>

          <div style="display:none;" id="reason">
            <div class="form-group">
             <label for="reason" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Description <span class="text-danger">*</span></label>
             <div class="input-group col-lg-8 col-md-8 col-sm-9 col-xs-8">
             <textarea name="reason" placeholder="Why do you need this server?" rows="5" class="form-control"></textarea>
              </div>
            </div>
          </div>

         </div>
         </div>
        </div>

        <div class="col-sm-6 col-md-6">
           <div class="form-group {{ $errors->has('startDate') ? ' has-error' : '' }}">
           <label for="startDate" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Start Date <span class="text-danger">*</span></label>
           <div class="input-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
           <input type="text" name="startDate" id="startDate" class="form-control">
              <div class="input-group-addon">
               <span class="help-inline">
                <i class="fa fa-info-circle" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Date the server will be started"></i>
              </span>
             </div>
            </div>
          </div>

           <div class="form-group">
           <label for="endDate" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">End Date</label>
           <div class="input-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
           <input type="text" name="endDate" id="endDate" class="form-control">
              <div class="input-group-addon">
               <span class="help-inline">
                <i class="fa fa-info-circle" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Date the server will be destroyed"></i>
              </span>
             </div>
            </div>
          </div>


          <div class="form-group ">
           <label for="operatingSystem" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Operating system <pan class="text-danger">*</span></label>
           <div class="input-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <select name="os" id="OperatingSystem" class="form-control">
             <option value="" selected="selected">-- Please select --</option>
             @foreach($OperatingSystems as $osItems)
                    @foreach($osItems as $item)
               <option  value="{!! $item['operatingSystem']["id"] !!}">{!! $item['operatingSystem']["name"] !!}</option>
              @endforeach
            @endforeach
            </select>

              <div class="input-group-addon">
               <span class="help-inline">
                <i class="fa fa-info-circle" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="What operating system needs to be installed"></i>
              </span>
             </div>
            </div>
          </div>

        </div>
      </section>


      <h3 class="{{ $errors->has('modelID') ? ' text-danger' : '' }}">Select server <span class="text-danger">*</span></h3>
       <section>
        <table id="servers" class="table table-bordered table-striped table-condensed">
         <thead>
          <tr>
            <th class="text-center">#</th>
            <th class="col-md-3">Server</th>
            <th>CPU</th>
            <th>Harddisk</th>
            <th>Memory</th>
            <th>Location</th>
            <th>Price</th>
            <th>Data price</th>
            <th>Available</th>
          </tr>
      </thead>
      <tbody>
      @foreach($models as $server)
             @foreach($server as $item)
        <tr>
        <td class="text-center"><input type="radio" name="modelID" value="{!! $item["id"] !!}"></td>
         <td>{!! $item["case"] !!}</td>
         <td>{!! $item["cpu"]["label"] !!}</td>
         <td>{!! $item["hdd"]["label"] !!}</td>
         <td>{!! $item["ram"]["label"] !!}</td>
         <td><a href="https://www.leaseweb.com/nl/platform/datacenters" target="_blank">{!! $item["location"]!!}</a></td>
         <td>{!! $item["price"] !!}</td>
         <td>{!! $item["pricePerGb"] !!}</td>
         <td>{!! $item["count"] !!}</td>
        </tr>
        @endforeach
      @endforeach
      </tbody>
      </table>
    </section>
      </div>
    </div>

  </form>
  </div>

<script type="text/javascript">
  $(document).ready(function() {
       $('#serverPool').on('change', function () {
         if (this.value == 'Customers') {
          $("#localID").hide();
           $("#customer").show();
         }
         else if (this.value == 'Production') {
            $("#customer").hide();
            $("#localID").show();
            $("#reason").show();
         }

        else if (this.value == 'Development') {
            $("#customer").hide();
            $("#localID").show();
            $("#reason").show();
         }
         else{
              $("#customer").hide();
              $("#localID").hide();
              $("#reason").hide();
         }
           });
     });


</script>
<script type="text/javascript">
$(document).ready(function() {
$("#wizard").steps({
  headerTag: 'h3',
	bodyTag: "section",
  enableAllSteps: true,
  enableFinishButton: false,
  transitionEffect: "slideLeft",
  labels: {
						next: "Next <i class=\"fa fa-angle-right\"></i>",
						previous: "<i class=\"fa fa-angle-left\"></i> Previous",
						current: "",
						finish: "Agree"
					},
          onStepChanged: function (event, currentIndex, priorIndex) {
            // adjust wizard height
            setContentHeight('#wizard')
          },

onFinished: function (event, currentIndex)
{
    alert("Submitted!");
}
});

// set initial wizard height
setContentHeight('#wizard');
        // rezie wizard on window resize
        $(window).on('resize',function() {
          setContentHeight('#wizard_101');
        })

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
@endsection
