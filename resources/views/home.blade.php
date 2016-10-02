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
     @widget('PayAsYouGoRequests')
    </div>
 </div>
</div>
@endsection
