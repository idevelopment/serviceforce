@extends('layouts.app')

@section('content')

@foreach($customer as $customer_item)
<div class="page-header">
  <h1>{!! $customer_item['fname'] !!} <small>{!! $customer_item['name'] !!}</small></h1>
  <h4 class="asset-status-label">
    <span data-toggle="tooltip" title="Asset has been entered into the system - A service in this state is inactive. It does minimal work and consumes minimal resources." data-placement="bottom" class="label label-warning">New</span></h4>
</div>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#overview" data-toggle="tab">{{ trans('customers.overview') }}</a></li>
      <li><a href="#services-info" data-toggle="tab">{{ trans('customers.services') }}</a></li>
      <li><a href="#log-info" data-toggle="tab">{{ trans('customers.logs') }}</a></li>
      <li class="dropdown" data-dropdown="dropdown">
        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown">
         <strong>{{ trans('customers.actions') }}</strong> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li>
            <a href="#customer-note" role="button" data-keyboard="true" data-toggle="modal">
            <i class="glyphicon glyphicon-comment"></i> {{ trans('servers.createNote') }}</a>
           </li>
          <li class="divider"></li>
          <li>
           <a href="#suspend-customer" role="button" data-keyboard="true" data-toggle="modal">
            {{ trans('customers.suspend') }}</a>
          </li>          
        </ul>
      </li>
      
        <li class="disabled" data-rel="tooltip" data-original-title="This asset is not graphable"><a href="javascript:void(0);">{{ trans('servers.graphs') }}</a></li>
     </ul>

     <!-- Tab panes -->
    <div class="tab-content">
     <div role="tabpanel" class="tab-pane active" id="overview">
     <table class="table table-hover table-condensed">
        <thead>
        <tr>
          <th class="col-sm-3 col-md-3"></th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>{{ trans('customers.number') }}</th>
            <td>{!! $customer_item['id'] !!}</td>
            <td></td>
        </tr>
         <tr>
          <th>{{ trans('customers.company') }}</th>
          <td>{!! $customer_item['company'] !!}</td>
          <td><span></span></td>          
        </tr>
        <tr>
          <th>{{ trans('customers.contact') }}</th>
          <td>{!! $customer_item['fname'] !!} {!! $customer_item['name'] !!}</td>
          <td><span></span></td>          
        </tr>
        <tr>
          <th>{{ trans('customers.address') }}</th>
          <td>
             <address>
               {!! $customer_item['address'] !!}<br>
               {!! $customer_item['zipcode'] !!} {!! $customer_item['city'] !!}<br>
               {!! $customer_item['country'] !!}
             </address>
          </td>
          <td></td>
        </tr>
          <tr>
          <th>{{ trans('customers.phone') }}</th>
            <td>{!! $customer_item['phone'] !!}</td>
            <td></td>
        </tr>
          <tr>
          <th>{{ trans('customers.mobile') }}</th>
            <td>{!! $customer_item['mobile'] !!}</td>
            <td></td>
        </tr>
          <tr>
          <th>{{ trans('customers.email') }}</th>
            <td>{!! $customer_item['email'] !!}</td>
            <td></td>
        </tr>
        <tr class="success">
          <td><strong>{{ trans('customers.status') }}</strong></td>
          <td>Active</td>          
          <td></td>
        </tr>
      </tbody>
    </table>
     </div>
     <div role="tabpanel" class="tab-pane" id="log-info">
      <table class="table table-bordered table-hover table-">
        <thead>
        <tr>
          <th>Date</th>
          <th>User</th>
          <th>Type</th>
          <th>Message</th>
        </tr>
      </thead>
      <tbody>
      <tr>
       <td>2016-05-31 04:58:00</td>
       <td>Administrator</td>
       <td><span class="label label-info">INFORMATIONAL</span></td>
       <td>Customer has been registrered to the platform</td>
      </tr>
      </tbody>
      </table>
     </div>
          <div role="tabpanel" class="tab-pane" id="services-info">
      <table class="table table-hover table-condensed">
        <thead>
        <tr>
          <th>ID</th>
          <th>Type</th>
          <th>Date created</th>
          <th>Last updated</th>          
          <th>Status</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      <tr class="info">
       <td>202119</td>
       <td>Bare Metal</td>
       <td>2016-05-31 00:00:00</td>
       <td>2016-05-31 00:00:00</td>
       <td>Provisioning</td>
       <td><a href="#"><i class="fa fa-wrench fa-lg" rel="tooltip" title="Manage"></i></a></td>
      </tr>

      <tr class="">
       <td>202119</td>
       <td>Bare Metal</td>
       <td>2016-05-31 00:00:00</td>
       <td>2016-05-31 00:00:00</td>
       <td>Provisioned</td>
       <td><a href="#"><i class="fa fa-wrench fa-lg"></i></a></td>
      </tr>

      <tr class="warning">
       <td>202129</td>
       <td>Virtual server</td>
       <td>2016-05-31 00:00:00</td>
       <td>2016-05-31 00:00:00</td>
       <td>Maintenance</td>
       <td><a href="#"><i class="fa fa-wrench fa-lg"></i></a></td>
      </tr>

      <tr class="danger">
       <td>20</td>
       <td>Webhosting</td>
       <td>2016-05-31 00:00:00</td>
       <td>2016-05-31 00:00:00</td>
       <td>Cancelled</td>
       <td><a href="#"><i class="fa fa-wrench fa-lg"></i></a></td>
      </tr>
      </tbody>
      </table>
     </div>
    </div>

  </div>
        @endforeach

  @endsection