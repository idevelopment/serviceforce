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
      <td>{!! $server["bareMetalId"] !!}</td>
      <td></td>
  </tr>
  <tr>
    <th>{{ trans('servers.customer') }}</th>
    <td><a href="#">iDevelopment</a></td>
    <td><span></span></td>
  </tr>
  <tr>
    <th>{{ trans('servers.serverType') }}</th>
    <td>{!! $server["serverType"] !!}</td>
    <td></td>
  </tr>
  <tr>
    <th>{{ trans('servers.site') }}</th>
    <td>{!! $server["serverLocation"]["Site"] !!}</td>
    <td></td>
  </tr>
  <tr>
    <th>{{ trans('servers.cabinet') }}</th>
    <td>{!! $server["serverLocation"]["Cabinet"] !!}</td>
    <td></td>
  </tr>
  <tr>
    <th>{{ trans('servers.chassisTag') }}</th>
    <td>{!! $server["serverName"] !!}</td>
    <td>Tag for asset chassis</td>
  </tr>

  @if ($server["serverStatus"] === "Provisioning")
   <tr class="warning">
     @elseif ($server["serverStatus"] === "Provisioned")
     <tr class="success">
   @elseif ($server["serverStatus"] === "Maintenance")
   <tr class="info">
     @else
   <tr class="warning">
     @endif
    <th>{{ trans('servers.serverState') }}</th>
    <td>{!! $server["serverStatus"] !!}</td>
    <td>{{trans('serverState.' . $server->serverStatus.'Helper')}}</td>
  </tr>

  @if ($server["serverState"] === "New")
   <tr class="warning">
     @elseif ($server["serverState"] === "Running")
     <tr class="success">
   @elseif ($server["serverState"] === "Maintenance")
   <tr class="info">
     @else
   <tr class="warning">
     @endif
    <td><strong>{{ trans('servers.assetStatus') }}</strong></td>
    <td>{!! $server["serverState"] !!}</td>
    <td>{{trans('serverState.' . $server->serverState.'Helper')}}</td>
  </tr>
  <tr class="success">
    <th>{{ trans('servers.switchportStatus') }}</th>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <th>{{ trans('servers.chassisTag') }}</th>
    <td>{!! $server["serverName"] !!}</td>
    <td>Tag for asset chassis</td>
  </tr>

  <tr>
    <th>{{ trans('servers.totalDisk') }}</th>
    <td>{!! $server["server"]["hardDisks"] !!}</td>
    <td>Total amount of available storage</td>
  </tr>

  <tr>
    <th>{{ trans('servers.sla') }}</th>
    <td> {!! $server["sla"]["slaName"] !!} </td>
    <td>Service Level Agreement Response time</td>
  </tr>
  <tr style="height:100px;">
    <th>QR CODE</th>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <th>{{ trans('servers.dateCreated') }}</th>
    <td>{!! $server["created_at"] !!}</td>
    <td></td>
  </tr>

  <tr>
    <th>{{ trans('servers.dateModified') }}</th>
    <td>{!! $server["updated_at"] !!}</td>
    <td></td>
  </tr>

</tbody>
</table>
