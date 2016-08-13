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
    <td>{!! $server["serverInfo"]["serverType"] !!}</td>
  </tr>
  <tr>
    <td>Processor Type</td>
    <td>
        {!! $server["serverInfo"]["processorType"] !!} {!! $server["serverInfo"]["processorSpeed"] !!}
    </td>
  </tr>
  <tr>
    <td>Total cpu</td>
    <td> {!! $server["serverInfo"]["numberOfCpus"] !!} </td>
  </tr>
   <tr>
    <td>Total cores</td>
    <td>{!! $server["serverInfo"]["numberOfCores"] !!} </td>
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
    <td> {!! $server["serverInfo"]["ram"] !!} </td>
  </tr>
</tbody>
</table>
