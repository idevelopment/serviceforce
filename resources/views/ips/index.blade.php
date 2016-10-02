@extends('layouts.app')
@section('content')

<div class="page-header">
<h1>IP management</h1>
</div>

<table class="table table-hover">
	 <thead>
        <tr>
          <th>IP</th>
          <th>Reverse lookup</th>
          <th class="col-md-2">ServerName</th>
        </tr>
      </thead>
      <tbody>
      @foreach($output as $outputItem)
      @foreach($outputItem as $item)
      <tr>
        <td><a href="{{url('ips/whois')}}/{!! $item->ip->ip !!}">{!! $item->ip->ip !!}</td>
        <td>{!! $item->ip->reverseLookup !!}</td>
        <td>{!! $item->ip->serverName !!}</td>
      </tr>
 @endforeach
@endforeach
      </tbody>
</table>
@endsection
