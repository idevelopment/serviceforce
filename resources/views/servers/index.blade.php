@extends('layouts.app')
@section('content')

 <div class="page-header">
      <h1>Server assets</h1>
    </div>

    @if(Session('success'))

    <div class="alert alert-success alert-dismissible fade in">
      <h4>Operation completed</h4>
      {{ Session('success')}}</div>
    @endif


    @if(Session('warning'))
    <div class="alert alert-danger alert-dismissible fade in">
      <button class="close" aria-label="Close" data-dismiss="alert" type="button">
        <span aria-hidden="true">×</span>
      </button>
      <h4>An error has occurred</h4>
      <p>{{ Session('warning')}}</p>
    </div>
    @endif

      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="@if(Request::is('servers')) active @else  @endif"><a href="#search" aria-controls="search" role="tab" data-toggle="tab">Search servers</a></li>
        <li role="presentation" class="@if(Request::is('servers/lookup')) active @else  @endif"><a href="#list" aria-controls="list" role="tab" data-toggle="tab">List all servers</a></li>
        <li role="presentation" class="@if(Request::is('servers/queue')) active @else  @endif"><a href="#queue" aria-controls="queue" role="tab" data-toggle="tab">{{ trans('servers.queue') }}
<span class="badge">{!! $Qcount !!}</span></a></li>

      </ul>

      <div class="tab-content">
        <div role="tabpanel" class="tab-pane @if(Request::is('servers')) active @else  @endif" id="search">
          <div class="clearfix">&nbsp;</div>
          @include('servers/widgets.search')
        </div>
        <div role="tabpanel" class="tab-pane @if(Request::is('servers/lookup')) active @else  @endif" id="list">
          @widget('ServersList')
        </div>
        <div role="tabpanel" class="tab-pane @if(Request::is('servers/queue')) active @else  @endif" id="queue">
          @widget('PayAsYouGoRequests')
        </div>

      </div>
@endsection
