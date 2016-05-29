@extends('layouts.app')

@section('content')
<div class="page-header">
<h1>Servers</h1>
</div>
<table class="table table-bordered table-hovered">
	 <thead>
        <tr>
          <th>Tag</th>
          <th>Hostname</th>
          <th>Status</th>
          <th>State</th> 
          <th>created</th> 
          <th>updated</th>                     
        </tr>
      </thead>
      <tbody>
      	<tr class="warning">
      	 <td><a href="{{ url('servers/display/1') }}">idev001</a></td>
      	 <td></td>
      	 <td>Running</td>
      	 <td>New</td>
      	 <td>2016-05-27 14:23:01</td>
      	 <td>2016-05-27 14:23:01</td>
      	 </tr>

        <tr class="">
         <td><a href="#">idev001</a></td>
         <td>local.idevelopment.be</td>
         <td>Running</td>
         <td>Provisioned</td>
         <td>2016-05-27 14:23:01</td>
         <td>2016-05-27 14:23:01</td>
         </tr>

      </tbody>
</table>
@endsection