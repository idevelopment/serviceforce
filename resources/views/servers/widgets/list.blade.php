<table class="table table-hovered">
	 <thead>
        <tr>
          <th>{{ trans ('servers.assetTag')}}</th>
          <th>{{ trans ('servers.serverType')}}</th>
          <th>{{ trans ('servers.serverState')}}</th>
          <th>{{ trans ('servers.assetStatus')}}</th>
          <th>{{ trans ('servers.dateCreated')}}</th>
          <th>{{ trans ('servers.dateModified')}}</th>
        </tr>
      </thead>
      <tbody>
      @foreach($servers as $item)
       @if ($item["serverStatus"] === "Provisioned")
        <tr class="">
        @elseif ($item["serverStatus"] === "Maintenance")
        <tr class="danger">
          @else
        <tr class="warning">
          @endif
        <td><a href="{{ url('servers/display') }}/{!! $item["bareMetalId"] !!}">{!! $item["serverName"] !!}</a></td>
         <td>{!! $item["serverType"] !!}</td>
      	 <td>{!! $item["serverStatus"] !!}</td>
      	 <td>{!! $item["serverState"] !!}</td>
      	 <td>{!! $item["created_at"] !!}</td>
      	 <td>{!! $item["updated_at"] !!}</td>
      	 </tr>
         @endforeach
      </tbody>
</table>
