@extends('layouts.app')

@section('content')
<form action="{{ url('servers/lookup') }}" method="GET" class="form-horizontal">
 <div class="page-header">
      <h1>Provision a new server</h1>
    </div>

    <input type="hidden" name="operation" value="and">
    <div class="row">
     <div class="col-sm-12">
      <h3>General data</h3><br>
       <div class="col-sm-6 col-md-6">
        <div class="row">
          <div class="col-sm-12 col-md-11 col-lg-9">
           <div class="form-group">
            <label for="serverPool" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Pool <span class="text-danger">*</span></label>
             <div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-8">
             <select name="serverPool" id="serverPool" class="form-control">
              <option value="" selected=""></option>
              <option value="production">Production</option>
              <option value="development">Development</option>
              <option value="customers">Customers</option>
              </select>

              <div class="input-group-addon">
               <span class="help-inline">
                <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="What kind of server do you like to request?"></i>
              </span>
             </div>
            </div>
          </div>

        <div style="display:none;" id="customer">
           <div class="form-group">
           <label for="customerID" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Customer</label>
           <div class="input-group col-lg-8 col-md-8 col-sm-9 col-xs-8">
           <input type="text" name="customerID" id="customerID" class="form-control">
              <div class="input-group-addon">
               <span class="help-inline">
                <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="bottom"  data-container="body" title="Customer number"></i>
              </span>
             </div>
            </div>
          </div>
        </div>

        <div style="display:none;" id="localID">
          <div class="form-group">
           <label for="type" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">User</label>
           <div class="input-group col-lg-8 col-md-8 col-sm-9 col-xs-8">
           <input type="text" name="customerNumber" value="{{ Auth::user()->id }}" class="form-control">
              <div class="input-group-addon">
               <span class="help-inline">
                <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip" data-placement="bottom"  data-container="body" title="What kind of server do you like to request?"></i>
              </span>
             </div>
            </div>
          </div>
        </div>

           <div class="form-group">
           <label for="type" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Server Type</label>
           <div class="input-group col-lg-8 col-md-8 col-sm-8 col-xs-8">
             <select name="type" id="type" class="form-control" disabled="">
              <option value="" selected="selected"></option>
              <option value="Bare Metal">Bare metal</option>
              <option value="Virtual server">Virtual server</option>
              <option value="pay-as-you-go" selected="selected">Pay as you go</option>
              </select>

              <div class="input-group-addon">
               <span class="help-inline">
                <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="What kind of server do you like to request?"></i>
              </span>
             </div>
            </div>
          </div>
          
         </div>
         </div>
        </div>

        <div class="col-sm-6 col-md-6">
           <div class="form-group">
           <label for="startDate" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Start Date</label>
           <div class="input-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
           <input type="text" name="startDate" class="form-control">
              <div class="input-group-addon">
               <span class="help-inline">
                <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Date the server will be started"></i>
              </span>
             </div>
            </div>
          </div>

           <div class="form-group">
           <label for="startDate" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">End Date</label>
           <div class="input-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
           <input type="text" name="endDate" class="form-control">
              <div class="input-group-addon">
               <span class="help-inline">
                <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="Date the server will be destroyed"></i>
              </span>
             </div>
            </div>
          </div>          

          <div class="form-group">
           <label for="operatingSystem" class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">Operating system</label>
           <div class="input-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
             <select name="operatingSystem" id="operatingSystem" class="form-control">
              <option value="" selected="selected"></option>
              <option value="">Ubuntu</option>
              <option value="">Centos</option>
              <option value="">FreeBSD</option>
              </select>

              <div class="input-group-addon">
               <span class="help-inline">
                <i class="glyphicon glyphicon-question-sign" data-toggle="tooltip"  data-placement="bottom"  data-container="body" title="What operating system needs to be installed"></i>
              </span>
             </div>
            </div>
          </div>

        </div>
      </div>
      </div>
      <hr>
    <div class="row">
      <div class="col-sm-11">
      <h3>Select server</h3><br>
      <table id="servers" class="table table-bordered table-striped table-condensed">
      <thead>
        <tr>
          <th class="text-center">#</th>
          <th>Server</th>
          <th>Memory</th>
          <th>Location</th>
          <th>Price</th>
          <th>Data price</th>
          <th>Available</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <td class="text-center"><input type="radio" name="modelID"></td>
         <td>HP DL180 G6/2x Intel Quad Core E5620/32GB</td>
         <td>32 GB</td>
         <td>AMS-01</td>
         <td>0.051</td>
         <td>0.1</td>
         <td>15</td>
        </tr>

        <tr>
        <td class="text-center"><input type="radio" name="modelID"></td>
         <td>HP DL180 G6/2x Intel Quad Core E5620/32GB</td>
         <td>32 GB</td>
         <td>AMS-01</td>
         <td>0.051</td>
         <td>0.1</td>
         <td>15</td>

        </tr>

        <tr>
        <td class="text-center"><input type="radio" name="modelID"></td>
         <td>HP DL180 G6/2x Intel Quad Core E5620/32GB</td>
         <td>32 GB</td>
         <td>AMS-01</td>
         <td>0.051</td>
         <td>0.1</td>
         <td>15</td>

        </tr>

        <tr>
        <td class="text-center"><input type="radio" name="modelID"></td>
         <td>HP DL180 G6/2x Intel Quad Core E5620/32GB</td>
         <td>32 GB</td>
         <td>AMS-01</td>
         <td>0.051</td>
         <td>0.1</td>
         <td>15</td>        
        </tr>
      </tbody>
      </table>      
      </div>
    </div> 
</form>

<script type="text/javascript">
  $(document).ready(function() {
    $('#servers').DataTable(
      {
        bFilter: false,
      });

       $('#serverPool').on('change', function () {
         if (this.value == 'customers') {
          $("#localID").hide();
           $("#customer").show();
         }
         else if (this.value == 'production') {
            $("#customer").hide();
            $("#localID").show();
         }

        else if (this.value == 'development') {
            $("#customer").hide();
            $("#localID").show();
         }
         else{
              $("#customer").hide();
              $("#localID").hide();
             }
           });
     });
</script>
@endsection