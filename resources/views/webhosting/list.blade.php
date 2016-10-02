@extends('layouts.app')
@section('content')

<div class="page-header">
<h1>Webhosting subscriptions</h1>
</div>

<table id="subscriptions" class="table table-condensed table-hovered">
	 <thead>
        <tr>
          <th>Domain name</th>
          <th>Customer</th>
          <th>Status</th>
          <th>Date Created</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      @foreach($subscriptions as $item)
       @if ($item["subscription_status"] === 16)
        <tr class="warning">
       @else
        <tr class="">
      @endif
         <td><a href="{{ url('webhosting/manage')}}/{!! $item["id"] !!}">{!! $item["name"] !!}</a></td>
         <td><a href="#">{!! $item["owner_id"] !!}</a></td>
         <td>
            @if ($item["subscription_status"] === 16)
             Suspended
            @elseif ($item["subscription_status"] === 0)
             Provisionised
            @else

            @endif
            </td>
        <td>{!! $item["created"] !!}</td>
        <td><a href="{{ url('webhosting/manage')}}/{!! $item["id"] !!}" data-toggle="tooltip" title="Account details" data-placement="bottom"><i class="fa fa-info-circle"></i></a></td>
      	</tr>
        @endforeach
      </tbody>
</table>


<script type="text/javascript">
  $(document).ready(function() {
    $('#subscriptions').DataTable();
} );
</script>
@endsection
