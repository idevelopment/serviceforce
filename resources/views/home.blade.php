@extends('layouts.app')

@section('content')

<!-- dashboard tiles -->
          <div class="row">
            <div class="col-sm-3 col-md-3">
              <div class="panel panel-tile text-center br-a br-grey">
                <div class="panel-body">
                  <h1 class="fs30 mt5 mbn">{!! $count !!}</h1>
               </div>
                <div class="panel-footer br-t p12">
                  <span class="fs11">
                      <h6>Pay-As-You-Go Servers</h6>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-sm-3 col-md-3">
              <div class="panel panel-tile text-center">
                <div class="panel-body">
                  <h1 class="fs30 mt5 mbn">63,262</h1>
                </div>
                <div class="panel-footer br-t p12">
                  <span class="fs11">
                    <h6 class="text-success">RUNNING SERVICES</h6>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-sm-3 col-md-3">
              <div class="panel panel-tile text-center br-a br-grey">
                <div class="panel-body">
                  <h1 class="fs30 mt5 mbn">248</h1>
                </div>
                <div class="panel-footer br-t p12">
                  <h6 class="text-warning">PENDING SERVICES</h6>

                </div>
              </div>
            </div>
            <div class="col-sm-3 col-md-3">
              <div class="panel panel-tile text-center br-a br-grey">
                <div class="panel-body">
                  <h1 class="fs30 mt5 mbn">6,718</h1>
                </div>
                <div class="panel-footer br-t p12">
                  <h6 class="text-danger">CANCELLED SERVICES</h6>
                </div>
              </div>
            </div>
          </div>

<div class="clearfix">&nbsp;</div>
<div class="clearfix">&nbsp;</div>

<div class="row">
  <div class="col-sm-12 col-md-12">
    <div class="panel panel-default">
    <div class="panel-heading">Recent pay as you go servers</div>
 <table class="table table-hover">
   <thead>
     <th>Request number</th>
     <th>Server ID</th>
     <th>Model</th>
     <th>Operating System</th>
     <th class="text-center">Status</th>
     <th>Pool</th>
     <th></th>
     <th>Date Created</th>
     <th>Last updated</th>
   </thead>
   <tbody>
     @foreach($PayAsYouGo as $server)
      @if($server->status == "progress")
      <tr class="warning">
      @elseif ($server->status == "completed")
      <tr class="success">
      @else
        <tr class="info">
      @endif
        <td>{!! $server->id !!}</td>
        <td>{!! $server->bareMetalId !!}</td>
        <td>{!! $server->modelLabel !!}</td>
        <td>{!! $server->osLabel !!}</td>

        @if($server->status == "progress")
        <td class="text-center" style="cursor: pointer; cursor: hand;"><i class="fa fa-spin fa-spinner"  data-toggle="tooltip" data-placement="bottom" title="Provisioning in progress"></i></td>
        @elseif ($server->status == "completed")
        <td class="text-center" style="cursor: pointer; cursor: hand;"><i class="fa fa-check"  data-toggle="tooltip" data-placement="bottom" title="Provisioning in progress"></i></td>
        @else
        <td class="text-center" style="cursor: pointer; cursor: hand;"><i class="fa fa-times"  data-toggle="tooltip" data-placement="bottom" title="Provisioning in progress"></i></td>
        @endif
        <td>Production</td>
        <td>iDevelopment</td>
        <td>{!! $server["created_at"] !!}</td>
        <td>{!! $server["updated_at"] !!}</td>
      </tr>
     @endforeach
   </tbody>
 </table>


 </div>
 </div>
</div>
@endsection
