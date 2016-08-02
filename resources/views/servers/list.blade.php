@extends('layouts.app')

@section('content')
<div class="page-header">
<h1>Servers</h1>
</div>
<table class="table table-hovered">
	 <thead>
        <tr>
          <th>Tag</th>
          <th>Type</th>
          <th>Status</th>
          <th>State</th>
          <th>SLA</th> 
          <th>Created</th> 
          <th>Updated</th>                     
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
        <td><a href="{{ url('servers/display') }}/{!! $item["id"] !!}">{!! $item["serverName"] !!}</a></td>
        <td>{!! $item["serverType"] !!}</td>
      	 <td>{!! $item["serverStatus"] !!}</td>
      	 <td>{!! $item["serverState"] !!}</td>
         <td>{!! $item["sla_id"] !!}</td>
      	 <td>{!! $item["created_at"] !!}</td>
      	 <td>{!! $item["updated_at"] !!}</td>
      	 </tr>
         @endforeach
      </tbody>
</table>
@endsection