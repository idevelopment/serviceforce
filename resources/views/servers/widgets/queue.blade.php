@if (count($PayAsYouGo) === 0)
 <p class="text-success">The provisioning queue is empty</p>
@else
<table class="table table-hover">
  <thead>
    <th class="col-md-1">{{ trans('servers.requestNumber') }}</th>
    <th>{{ trans('servers.assetTag') }}</th>
    <th>{{ trans('servers.model') }}</th>
    <th>{{ trans('servers.operatingSystem') }}</th>
    <th>Status</th>
    <th>{{ trans('servers.pool') }}</th>
    <th>{{ trans('servers.requester') }}</th>
    <th>{{ trans('servers.dateCreated') }}</th>
    <th>{{ trans('servers.dateModified') }}</th>
    <th></th>
  </thead>
  <tbody>
    @foreach($PayAsYouGoQ as $server)
     @if($server->status == "New")
       <tr class="warning">
     @elseif ($server->status == "Starting")
       <tr class="warning">
    @elseif ($server->status == "Provisioning")
       <tr class="warning">
     @elseif ($server->status == "Provisioned")
       <tr class="success">
     @else
       <tr class="danger">
     @endif
       <td>{!! $server->id !!}</td>
       <td><a href="{{url('servers/display')}}/{!! $server->bareMetalId !!}">{!! $server->bareMetalId !!}</a></td>
       <td>{!! $server->modelLabel !!}</td>
       <td>{!! $server->osLabel !!}</td>

       @if($server->status == "progress")
        <td class="text-center">{{ trans('status.inProgress') }}</td>
       @elseif ($server->status == "completed")
        <td class="text-center">{{ trans('status.completed') }}</td>
       @else
        <td>{!! $server->status !!}</i></td>
       @endif

       <td>{!! $server->pool !!}</td>
       <td>iDevelopment</td>
       <td>{!! $server["created_at"] !!}</td>
       <td>{!! $server["updated_at"] !!}</td>
       <td>@if($server->status == "New")
         <a href="{{url('servers/removeq')}}/{!! $server->id !!}" class="btn btn-default"><i class="fa fa-trash"></i> Cancel order</a></td>
          @endif
     </tr>
    @endforeach
  </tbody>
</table>
@endif
